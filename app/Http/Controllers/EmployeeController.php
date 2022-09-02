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
                $path = $request->photo->store(public_path('employee/'));
                $employee->photo = $image_name;
            }
        }
        if($employee->save()){
            session()->flash('success', 'Your Application has been submitted');
            return redirect('/dashboard');
        }
        

        
    }
}
