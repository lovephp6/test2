<?php

namespace App\Http\Controllers\Admin;

use App\Model\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function index()
    {
        $villa_mans = Hotel::where(['hotel_sex' => '男生宿舍', 'hotel_type' => '别墅区'])->get();
        $villa_womans = Hotel::where(['hotel_sex' => '女生宿舍', 'hotel_type' => '别墅区'])->get();
        $hotel_mans = Hotel::where(['hotel_sex' => '男生宿舍', 'hotel_type' => '公寓区'])->get();
        $hotel_womans = Hotel::where(['hotel_sex' => '女生宿舍', 'hotel_type' => '公寓区'])->get();
        return view('admin/hotel/index', ['villa_mans' => $villa_mans, 'villa_womans' => $villa_womans, 'hotel_mans' => $hotel_mans, 'hotel_womans' => $hotel_womans]);
    }

    public function add(Request $request)
    {
//        $res = $request->except('_token');
//        if (Hotel::create($res)) {
//            return redirect()->back()->with('success', '添加成功');
//        } else {
//            return redirect()->back()->with('error', '添加失败');
//        }
        return view('admin/hotel/add');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $res = Hotel::where('id', $id)->delete();
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

    public function edit(Request $request, $id)
    {
        $hotelMsg = Hotel::find($id);
        if ($request->isMethod('post')) {
            $hotels = $request->except('_token');
            $res = Hotel::where('id', $id)->update($hotels);
            if ($res) {
                return redirect('admin/hotel/index');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/hotel/edit',['hotelMsg' => $hotelMsg]);
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $stuMsg = Hotel::where('id', $id)->first();
        $stu_num['student_count'] = $stuMsg['student_count'];
        return json_encode($stu_num);
    }
}
