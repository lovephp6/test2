<?php

namespace App\Http\Controllers\Admin;

use App\Model\Helps;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpsController extends Controller
{
    public function index()
    {
        $moneys = Helps::all();
        return view('admin/helps/index', compact('moneys'));
    }

    public function add(Request $request)
    {
        $helps = $request->except('_token');
        $res = \DB::table('helps')->insert($helps);
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
        $schoolname['helps_money'] = $request->input('schoolname');
        $res = Helps::where('id', $id)->update($schoolname);
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
        $res = Helps::where('id', $id)->delete();
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

    public function gethelps(Request $request)
    {
        $bz = $request->input('bz');
        $home['helps_money'] = Helps::where('helps_name', $bz)->first()['helps_money'];
        if ($home['helps_money']) {
            return $home;
        }
    }
}
