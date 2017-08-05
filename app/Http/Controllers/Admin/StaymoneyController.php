<?php

namespace App\Http\Controllers\Admin;

use App\Model\Staymoney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaymoneyController extends Controller
{
    public function index()
    {
        $staymoneys = Staymoney::all();
        return view('admin/staymoney/index',compact('staymoneys'));
    }

    public function add(Request $request)
    {
        $moneyMsg = $request->except('_token');
        $res = \DB::table('staymoney')->insert($moneyMsg);
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
        $schoolname['stay_money'] = $request->input('schoolname');
        $res = Staymoney::where('id', $id)->update($schoolname);
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
        $res = Staymoney::where('id', $id)->delete();
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

    public function gethomes(Request $request)
    {
        $bz = $request->input('bz');
        $home['stay_money'] = Staymoney::where('stay_standard', $bz)->first()['stay_money'];
        if ($home['stay_money']) {
            return $home;
        }
    }
}
