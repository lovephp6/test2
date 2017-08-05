<?php

namespace App\Http\Controllers\Admin;

use App\Model\Lschool;
use App\Model\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LschoolController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        $xuezhis = \DB::table('majors')->join('lschools', 'majors.id', '=', 'lschools.major_id')->orderBy('major_id')->get();
        return view('admin/lschool/index', compact('majors','xuezhis'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $xuezhi = $request->except('_token');
            $res = \DB::table('lschools')->insert($xuezhi);
            if ($res) {
                return redirect('admin/lschool/index');
            }
        }

    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $schoolname['major_date'] = $request->input('schoolname');
        $res = Lschool::where('id', $id)->update($schoolname);
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
        $res = Lschool::where('id', $id)->delete();
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
