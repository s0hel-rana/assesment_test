<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::latest()->get();
        return view('all_employee',compact('employees'));
    }

    public function addEmployee(){
        return view('add_employee');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'skill' => 'required',
            'gender' => 'required',
        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/upload'), $filename);
        }
        if(is_null($request->skill)){
            return redirect()->route('employee');
        }
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $filename,
            'skill' => implode(",", $request->skill),
            'gender' => $request->gender
        ]);

        toastr()->success('Data has been created successfully!');
        return redirect()->route('employee');
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('edit_employee',compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/upload'), $filename);
        }
        if(is_null($request->skill)){
            return redirect()->route('employee');
        }
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $filename,
            'skill' => implode(",", $request->skill),
            'gender' => $request->gender
        ]);
        toastr()->success('Data has been updated  successfully!');
        return redirect()->route('employee');
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $image = str_replace('\\', '/', public_path('/upload/' . $employee->image));
        if (is_file($image)){
            unlink($image);
            $employee->delete();
            toastr()->success('Deleted  successfully!');
            return redirect()->route('employee');
        }else {
            $employee->delete();
            toastr()->success('Deleted  successfully!');
            return redirect()->back();
        }
    }
}
