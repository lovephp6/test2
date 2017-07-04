<?php

namespace App\Http\Controllers\Admin;

use App\Model\Staff;
use App\Model\Student;
use App\Model\Wages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{
    /**
     *  人事管理
     */
    public function staff()
    {
        $staffMsgs = Staff::all();
        return view('admin/personnel/staff', ['staffMsgs' => $staffMsgs]);
    }

    public function add_staff(Request $request)
    {
        if ($request->isMethod('post')) {
            $staffMsg = $request->except('_token');
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $staffMsg['photo'], $result)) {
                $ext = $result[2];
                $filename = "./upload/photos/" . md5(date('YmdHsi', time()) . rand(10000, 99999)) . ".{$ext}";
                if (file_put_contents($filename, base64_decode(str_replace($result[1], '', $staffMsg['photo'])))) {
                    $staffMsg['photo'] = $filename;
                } else {
                    die('照片出错');
                }
            }
            $staffMsg['staff_born'] = strtotime($staffMsg['staff_born']);
            $staffMsg['staff_parents_name'] = json_encode($staffMsg['staff_parents_name']);
            $staffMsg['staff_parents_relationship'] = json_encode($staffMsg['staff_parents_relationship']);
            $staffMsg['staff_parents_company'] = json_encode($staffMsg['staff_parents_company']);
            $staffMsg['staff_parents_phone'] = json_encode($staffMsg['staff_parents_phone']);
            $staffMsg['staff_startDate_school'] = json_encode($staffMsg['staff_startDate_school']);
            $staffMsg['staff_school_name'] = json_encode($staffMsg['staff_school_name']);
            $staffMsg['staff_major_school'] = json_encode($staffMsg['staff_major_school']);
            $staffMsg['staff_startDate_work'] = json_encode($staffMsg['staff_startDate_work']);
            $staffMsg['staff_post'] = json_encode($staffMsg['staff_post']);
            $staffMsg['staff_unitName'] = json_encode($staffMsg['staff_unitName']);
            if (Staff::create($staffMsg)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/personnel/add_staff');
    }

    // 添加入职信息
    public function add_entry(Request $request)
    {
        $entry = $request->except('_token', 'staff_num');
        $entry['staff_entryDate'] = strtotime($entry['staff_entryDate']);
        $entry['staff_contractDate'] = strtotime($entry['staff_contractDate']);
        $staff_num = $request->input('staff_num');
        $res = DB::table('staff')->where('staff_num', $staff_num)->update(['staff_department' => $entry['staff_department'], 'staff_postNew' => $entry['staff_postNew'], 'staff_employ' => $entry['staff_employ'], 'staff_entryDate' => $entry['staff_entryDate'], 'staff_contractDate' => $entry['staff_contractDate'], 'staff_contractPeriod' => $entry['staff_contractPeriod']]);
        if ($res) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
    }
    // 添加工资信息
    public function add_wages(Request $request)
    {
        $wages = $request->except('_token');
        $res = DB::table('staff')->where('staff_num', $wages['staff_num'])
            ->update(['staff_probation' => $wages['staff_probation'], 'staff_full' => $wages['staff_full'], 'staff_seniority' => $wages['staff_seniority'], 'staff_meal' => $wages['staff_meal'], 'staff_traffic' => $wages['staff_traffic'], 'staff_communication' => $wages['staff_communication'], 'staff_travel' => $wages['staff_travel'], 'staff_overtime' => $wages['staff_overtime'], 'staff_achievements' => $wages['staff_achievements']]);
        if ($res) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
    }
    // 添加保险信息
    public function add_safe(Request $request)
    {
        $safe = $request->except('_token');
        $res = DB::table('staff')->where('staff_num', $safe['staff_num'])
            ->update(['staff_insurance' => $safe['staff_insurance'], 'staff_social' => $safe['staff_social'], 'staff_fund' => $safe['staff_fund']]);
        if ($res) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
    }

    // 添加银行账户信息
    public function add_account(Request $request)
    {
        $account = $request->except('_token');
        $res = DB::table('staff')->where('staff_num', $account['staff_num'])
            ->update(['staff_bank' => $account['staff_bank'], 'staff_bankName' => $account['staff_bankName'], 'staff_bankNumber' => $account['staff_bankNumber']]);
        if ($res) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
    }
    // 离职信息添加
    public function add_quit(Request $request)
    {
        $quit = $request->except('_token');
        $quit['staff_leaveDate'] = strtotime($quit['staff_leaveDate']);
        $res = DB::table('staff')->where('staff_num', $quit['staff_num'])
            ->update(['staff_leaveReason' => $quit['staff_leaveReason'], 'staff_leaveDate' => $quit['staff_leaveDate'], 'staff_leaveType' => $quit['staff_leaveType']]);
        if ($res) {
            return redirect()->back()->with('success', '添加成功');
        } else {
            return redirect()->back()->with('error', '添加失败');
        }
    }
    
    // 删除方法
    public function delete_staff(Request $request)
    {
        $id = $request->input('id');
        $res = Staff::where('id', $id)->delete();
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
    
    // 展示方法
    public function show_staff($id)
    {
        $staffMsg = Staff::find($id);
        $staffMsg['staff_parents_name'] = json_decode($staffMsg['staff_parents_name']);
        $staffMsg['staff_parents_relationship'] = json_decode($staffMsg['staff_parents_relationship']);
        $staffMsg['staff_parents_company'] = json_decode($staffMsg['staff_parents_company']);
        $staffMsg['staff_parents_phone'] = json_decode($staffMsg['staff_parents_phone']);
        $staffMsg['staff_startDate_school'] = json_decode($staffMsg['staff_startDate_school']);
        $staffMsg['staff_school_name'] = json_decode($staffMsg['staff_school_name']);
        $staffMsg['staff_major_school'] = json_decode($staffMsg['staff_major_school']);
        $staffMsg['staff_startDate_work'] = json_decode($staffMsg['staff_startDate_work']);
        $staffMsg['staff_post'] = json_decode($staffMsg['staff_post']);
        $staffMsg['staff_unitName'] = json_decode($staffMsg['staff_unitName']);
        return view('admin/personnel/show_staff', ['staffMsg' => $staffMsg]);
    }
    
    // 编辑方法
    public function edit_staff(Request $request, $id)
    {
        $staffMsg = Staff::find($id);
        $staffMsg['staff_parents_name'] = json_decode($staffMsg['staff_parents_name']);
        $staffMsg['staff_parents_relationship'] = json_decode($staffMsg['staff_parents_relationship']);
        $staffMsg['staff_parents_company'] = json_decode($staffMsg['staff_parents_company']);
        $staffMsg['staff_parents_phone'] = json_decode($staffMsg['staff_parents_phone']);
        $staffMsg['staff_startDate_school'] = json_decode($staffMsg['staff_startDate_school']);
        $staffMsg['staff_school_name'] = json_decode($staffMsg['staff_school_name']);
        $staffMsg['staff_major_school'] = json_decode($staffMsg['staff_major_school']);
        $staffMsg['staff_startDate_work'] = json_decode($staffMsg['staff_startDate_work']);
        $staffMsg['staff_post'] = json_decode($staffMsg['staff_post']);
        $staffMsg['staff_unitName'] = json_decode($staffMsg['staff_unitName']);
        if ($request->isMethod('post')) {
            $staffMsg = $request->except('_token');
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $staffMsg['photo'], $result)) {
                $ext = $result[2];
                $filename = "./upload/photos/" . md5(date('YmdHsi', time()) . rand(10000, 99999)) . ".{$ext}";
                if (file_put_contents($filename, base64_decode(str_replace($result[1], '', $staffMsg['photo'])))) {
                    $staffMsg['photo'] = $filename;
                } else {
                    die('照片出错');
                }
            }
            $staffMsg['staff_born'] = strtotime($staffMsg['staff_born']);
            $staffMsg['staff_graduationDate'] = strtotime($staffMsg['staff_graduationDate']);
            $staffMsg['staff_parents_name'] = json_encode($staffMsg['staff_parents_name']);
            $staffMsg['staff_parents_relationship'] = json_encode($staffMsg['staff_parents_relationship']);
            $staffMsg['staff_parents_company'] = json_encode($staffMsg['staff_parents_company']);
            $staffMsg['staff_parents_phone'] = json_encode($staffMsg['staff_parents_phone']);
            $staffMsg['staff_startDate_school'] = json_encode($staffMsg['staff_startDate_school']);
            $staffMsg['staff_school_name'] = json_encode($staffMsg['staff_school_name']);
            $staffMsg['staff_major_school'] = json_encode($staffMsg['staff_major_school']);
            $staffMsg['staff_startDate_work'] = json_encode($staffMsg['staff_startDate_work']);
            $staffMsg['staff_post'] = json_encode($staffMsg['staff_post']);
            $staffMsg['staff_unitName'] = json_encode($staffMsg['staff_unitName']);
            $res = Staff::where('id', $id)->update($staffMsg);
            if ($res) {
                return redirect()->back()->with('success', '修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/personnel/edit_staff', ['staffMsg' => $staffMsg]);
    }
    
    // 工资表
    public function payroll()
    {
        $wages = DB::table('staff')->join('wages', 'staff.staff_name', '=', 'wages.name')->get();
        return view('admin/personnel/payroll', ['wages' => $wages]);
    }
    
    // 出勤录入
    public function attendance(Request $request)
    {
        $staffs = Staff::all();
        if ($request->isMethod('post')) {
            $wages = $request->except('_token');
            $wages['wages_month'] = strtotime($wages['wages_month']);
            if (Wages::create($wages)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }

        return view('admin/personnel/attendance', ['staffs' => $staffs]);
    }
    
    // 删除工资记录
    public function delete_payroll(Request $request)
    {
        $id = $request->input('id');
        $res = Wages::where('id', $id)->delete();
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
