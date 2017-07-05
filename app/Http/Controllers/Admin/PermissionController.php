<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin/permission/index', ['permissions' => $permissions]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $permissions = $request->except('_token');
            if (Permission::create($permissions)) {
                return redirect()->back()->with('success', '添加权限成功');
            } else {
                return redirect()->back()->with('error', '添加权限失败');
            }
        }
        return view('admin/permission/add');
    }

    public function edit(Request $request, $id)
    {
        $permission = Permission::find($id);
        if ($request->isMethod('post')) {
            $permissions = $request->except('_token');
            $res = Permission::where('id', $id)->update($permissions);
            if ($res) {
                return redirect()->back()->with('success_edit', '修改权限成功');
            } else {
                return redirect()->back()->with('error_edit', '修改权限失败');
            }
        }
        return view('admin/permission/edit', ['permission' => $permission]);
    }
}
