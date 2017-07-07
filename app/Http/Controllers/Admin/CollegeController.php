<?php

namespace App\Http\Controllers\Admin;

use App\Model\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::orderBy('sort', 'desc')->get();
        return view('admin/college/index', compact('colleges'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $colleges = $request->except('_token');
            if (College::create($colleges)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/college/add');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $res = College::where('id', $id)->delete();
        $data = [];
        if ($res) {
            $data['state'] = 200;
            $data['message'] = '删除成功';
            return $data;
        } else {
            $data['state'] = 0;
            $data['message'] = '删除失败';
            return $data;
        }
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $schoolname['school_name'] = $request->input('schoolname');
        $res = College::where('id', $id)->update($schoolname);
        $data = [];
        if ($res) {
            $data['state'] = 200;
            $data['message'] = '修改成功';
            return $data;
        } else {
            $data['state'] = 0;
            $data['message'] = '修改失败';
            return $data;
        }
    }
}
