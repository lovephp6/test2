<?php

namespace App\Http\Controllers\Admin;

use App\Model\Actives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivesController extends Controller
{
    public function index()
    {
        $actives = Actives::orderBy('sort', 'desc')->get();
        return view('admin/actives/index', compact('actives'));
    }

    public function add(Request $request)
    {
        $actives = $request->except('_token');
        $res = \DB::table('actives')->insert($actives);
        if ($res) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
    }

    public function edit(Request $request)
    {
        $res= $request->except('_token');
        $id = $request->input('id');
        $schoolname['active_name'] = $request->input('schoolname');
        $res = Actives::where('id', $id)->update($schoolname);
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
        $res = Actives::where('id', $id)->delete();
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
