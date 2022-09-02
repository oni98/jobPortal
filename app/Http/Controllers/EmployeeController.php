<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('backend.employee_list', with(['employees' => $employees]));
    }

    public function store(Request $request){

        $employee = new Employee();
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
        if(!empty($request->photo)){
            if(!file_exists(public_path('employee/'.$request->photo))){
                $image_name = time().'.'.$request->photo->getClientOriginalExtension();
                $path = $request->photo->store(public_path('employee/'.$image_name));
                $employee->photo = $image_name;
            }
        }
        if($employee->save()){
            session()->flash('success', 'Your Application has been submitted');
            return redirect('/dashboard');
        }
    }

    public function viewDetails($id){
        $employee = Employee::find($id);
        return view('backend.applicant_details', with(['applicant' => $employee]));
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
}
