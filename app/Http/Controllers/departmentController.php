<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class departmentController extends Controller
{
    public function index()
    {
        $Departments = Department::all()->toArray();
        return array_reverse($Departments);      
    }

    public function store(Request $request)
    {
        $Department = new Department([
            'DepartmentName' => $request->input('DepartmentName'),
            'DepartmentId' => $request->input('DepartmentId'),
            'DepartmentNameFilter' => $request->input('DepartmentNameFilter')
        ]);
        $Department->save();

        return response()->json('Department created!');
    }

    public function show($id)
    {
        $Department = Department::find($id);
        return response()->json($Department);
    }

    public function update($id, Request $request)
    {
        $Department = Department::find($id);
        $Department->update($request->all());

        return response()->json('Department updated!');
    }

    public function destroy($id)
    {
        $Department = Department::find($id);
        $Department->delete();

        return response()->json('Department deleted!');
    }
}
