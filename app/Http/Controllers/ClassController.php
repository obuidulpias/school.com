<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\ClassModel;
use Str;

class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getClass();
        $data['header_title'] = 'Class List';
        return view('admin.class.list', $data);
    }
    public function add()
    {
        $data['header_title'] = 'Add New Class';
        return view('admin.class.add', $data);
    }
    public function insert(Request $request)
    {
        //dd($request->all());
        $class = new ClassModel;
        $class->name = trim($request->name);
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect('admin/class/list')->with('success', "Class added successfully.");
    }
    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Class';
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        //dd($request->all());
        $class = ClassModel::getSingle($id);
        $class->name = trim($request->name);
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect('admin/class/list')->with('success', "Class updated successfully.");
    }
    public function delete($id)
    {
        //dd($request->all());
        $class = ClassModel::getSingle($id);
        $class->is_deleted = 1;
        $class->save();

        return redirect('admin/class/list')->with('success', "Class deleted successfully.");
    }
}
