<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){
        $employers = Employer::all();
        return view('backend.employer.employer_list', with(['employers' => $employers]));
    }

    public function store(Request $request){

        $employer = new Employer();
        do {
            $code = random_int(100000, 999999);
        } while (employer::where("code", "=", $code)->first());

        $employer->code = $code;
        $employer = $this->patch($employer, $request, $code);

        if($employer->save()){
            session()->flash('success', 'Your Application has been submitted');
            return redirect('/dashboard');
        }
    }

    public function viewDetails($id){
        $employer = Employer::find($id);
        return view('backend.employer.applicant_details', with(['applicant' => $employer]));
    }

    public function editDetails($id){
        $employer = Employer::find($id);
        return view('backend.employer.applicant_edit', with(['applicant' => $employer]));
    }
    
    public function update(Request $request, $id){

        $employer = Employer::find($id);
        $employer = $this->patch($employer, $request, $employer->code);

        if($employer->save()){
            session()->flash('success', 'The Application has been Updated');
            return redirect('/admin/employer/'.$id.'/details');
        }
    }

    public function destroy($id)
    {
        $user = Employer::find($id);

        if(!is_null($user)){
            $user->delete();
        }

        session()->flash('success', 'Employer has been Deleted');
        return redirect('/admin/employer/list');
    }

     /**
     * @param $request
     * @param $application
     * @return object
     */
    private function patch($employer, $request, $code): object
    {
        $employer->company_name = $request->company_name;
        $employer->company_phone = $request->company_phone;
        $employer->company_address = $request->company_address;
        $employer->entrepreneur = $request->entrepreneur;
        $employer->business_type = $request->business_type;
        $employer->business_description = $request->business_description;
        $employer->website = $request->website;
        $employer->email = $request->email;
        $employer->trade_license = $this->image($code, $request->trade_license, $employer);

        return $employer;
    }

    /**
     * @param $application->name
     * @param $request->image
     */
    private function image($code, $image, $employer)
    {
        if(!empty($image)){
            if(!file_exists('public/employer/'.$code.'/'.$employer->trade_license)){
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/employer/'.$code.'/', $image_name);
                return $image_name;
            }else{
                unlink(public_path('storage/employer/'.$code.'/'. $employer->trade_license));
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/employer/'.$code.'/', $image_name);
                return $image_name;
            }
        }
    }
}
