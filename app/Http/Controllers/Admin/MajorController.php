<?php

namespace App\Http\Controllers\Admin;

use App\Model\College;
use App\Model\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    public function index()
    {
        $colleges = College::orderBy('sort', 'desc')->get();
        $majors = \DB::table('colleges')->join('majors', 'majors.college_id', '=', 'colleges.id')->orderBy('college_id')->get();
        return view('admin/major/index', compact(['majors', 'colleges']));
    }

    public function add(Request $request)
    {
        $majors = $request->except('_token');
        if (Major::create($majors)) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
        return view('admin/major/add');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $schoolname['major_name'] = $request->input('schoolname');
        $res = Major::where('id', $id)->update($schoolname);
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

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $res = Major::where('id', $id)->delete();
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
}
