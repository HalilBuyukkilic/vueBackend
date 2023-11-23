<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class employeeController extends Controller
{
    public function index()
    {
        $Employees = Employee::all()->toArray();
        return array_reverse($Employees);      
    }

    public function store(Request $request)
    {
        $Employee = new Employee([
            'EmployeeName' => $request->input('EmployeeName'),
            'Department' => $request->input('Department'),
            'DateOfJoining' => $request->input('DateOfJoining'),
            'PhotoFileName' => $request->input('PhotoFileName'),
            'PhotoPath' => $request->input('PhotoPath')
        ]);
        $Employee->save();

        return response()->json('Employee created!');
    }

    public function show($id)
    {
        $Employee = Employee::find($id);
        return response()->json($Employee);
    }

    public function update($id, Request $request)
    {
        $Employee = Employee::find($id);
        $Employee->update($request->all());

        return response()->json('Employee updated!');
    }

    public function destroy($id)
    {
        $Employee = Employee::find($id);
        $Employee->delete();

        return response()->json('Employee deleted!');
    }
}
