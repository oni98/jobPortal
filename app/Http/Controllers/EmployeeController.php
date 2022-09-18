<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('backend.employee.employee_list', with(['employees' => $employees]));
    }

    public function store(Request $request){

        $employee = new Employee();
        do {
            $code = random_int(100000, 999999);
        } while (Employee::where("code", "=", $code)->first());

        $employee->code = $code;
        $employee = $this->patch($employee, $request, $code);

        if($employee->save()){
            session()->flash('success', 'Your Application has been submitted');
            return redirect('/dashboard');
        }
    }

    public function viewDetails($id){
        $employee = Employee::find($id);
        return view('backend.employee.applicant_details', with(['applicant' => $employee]));
    }

    public function editDetails($id){
        $employee = Employee::find($id);
        return view('backend.employee.applicant_edit', with(['applicant' => $employee]));
    }
    
    public function update(Request $request, $id){

        $employee = Employee::find($id);
        $employee = $this->patch($employee, $request, $employee->code);

        if($employee->save()){
            session()->flash('success', 'The Application has been Updated');
            return redirect('/admin/employee/'.$id.'/details');
        }
    }

    public function destroy($id)
    {
        $user = Employee::find($id);

        if(!is_null($user)){
            $user->delete();
        }

        session()->flash('success', 'Employee has been Deleted');
        return redirect('/admin/employee/list');
    }

     /**
     * @param $request
     * @param $application
     * @return object
     */
    private function patch($employee, $request, $code): object
    {
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->skill = $request->skill;
        $employee->profession = $request->profession;
        $employee->education = $request->education;
        $employee->birth_date = $request->birth_date;
        $employee->gender = $request->gender;
        $employee->religion = $request->religion;
        $employee->nationality = $request->nationality;
        $employee->photo = $this->image($code, $request->photo, $employee);

        return $employee;
    }

    /**
     * @param $application->name
     * @param $request->image
     */
    private function image($code, $image, $employee)
    {
        if(!empty($image)){
            if(!file_exists('public/employee/'.$code.'/'.$employee->photo)){
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/employee/'.$code.'/', $image_name);
                return $image_name;
            }else{
                unlink(public_path('storage/employee/'.$code.'/'. $employee->photo));
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/employee/'.$code.'/', $image_name);
                return $image_name;
            }
        }
    }
}
