<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roleMsgs = Role::all();
        return view('admin/role/index', ['roleMsgs' => $roleMsgs]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $roles = $request->except('_token');
            if (Role::create($roles)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/role/add');
    }

    public function edit(Request $request, $id)
    {
        $roleMsg = Role::find($id);
        if ($request->isMethod('post')) {
            $roleMsgs = $request->except('_token');
            $res = Role::where('id', $id)->update($roleMsgs);
            if ($res) {
                return redirect()->back()->with('success_edit', '修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/role/edit', ['roleMsg' => $roleMsg]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $res = Role::where('id', $id)->delete();
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
