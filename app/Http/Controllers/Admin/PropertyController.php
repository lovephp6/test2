<?php

namespace App\Http\Controllers\Admin;

use App\Model\Actives;
use App\Model\Arrears;
use App\Model\Charge;
use App\Model\Finance;
use App\Model\Helps;
use App\Model\Refund;
use App\Model\Staymoney;
use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function Tuition_fee(Request $request)
    {
        $homeMsgs = Staymoney::all();
        $avtives = Actives::all();
        $helps = Helps::all();
        if($request->isMethod('post')) {
            $card = $request->input('CardNo');
            $studentMsg = Student::where('CardNo', $card)->first();;
            return view('admin/property/tuition_fee', compact(['studentMsg', 'homeMsgs', 'avtives', 'helps']));

        }
        return view('admin/property/tuition_fee', compact('homeMsgs', 'avtives', 'helps'));
    }
    
    // 插入数据
    public function add_tuition_fee(Request $request)
    {
        if ($request->isMethod('post')) {
            $res = $request->except('_token');
            $aa['cost_state'] = 1;
            $res2 = Student::where('CardNo', $res['CardNo'])->update($aa);
            if (Charge::create($res) && $res2){
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/property/tuition_fee');
    }

    public function total_money()
    {
        $studentTuition = \DB::table('students')->join('charge','charge.CardNo','=','students.CardNo')->get();
        return view('admin/property/total_money', ['studentTuition' => $studentTuition]);
    }
    // 修改方法
    public function edit_tuition_fee(Request $request, $id)
    {
        $charges = Charge::find($id);
        $CardNo = Charge::where('id', $id)->first()->CardNo;
        $students = Student::where('CardNo', $CardNo)->first();
        $charges['Name'] = $students['Name'];
        $charges['Sex'] = $students['Sex'];
        $charges['Born'] = $students['Born'];
        $charges['major_name'] = $students['major_name'];
        $charges['major_type'] = $students['major_type'];
        $charges['major_date'] = $students['major_date'];
        if ($request->isMethod('post')) {
            $charge_res = $request->except('_token');
            $res = Charge::where('id', $id)->update($charge_res);
            if ($res) {
                return redirect()->back()->with('success', '修改成功');
            } else {
                return redirect()->back()->with('success', '修改失败');
            }
        }
        return view('admin/property/edit_tuition_fee', ['charges' => $charges]);
    }

    //删除方法
    public function delete_tuition_fee(Request $request)
    {
        $id = $request->input('id');
        $res = Charge::where('id', $id)->delete();
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
    // 票据
    public function shouju()
    {
        return view('admin/property/shouju');
    }

    // 退还学费
    public function refund(Request $request)
    {
        $charge_msg = \DB::table('students')->join('charge', 'charge.CardNo', '=', 'students.CardNo')->first();
        return view('admin/property/refund', ['charge_msg' => $charge_msg]);
    }
    // 退费学生信息
    public function refund_stu_msg(Request $request)
    {
        if ($request->isMethod('post')){
            $refund_msg = $request->except('_token');
            $refund_msg['refund_date'] = strtotime($refund_msg['refund_date']);
            if (Refund::create($refund_msg)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }

        return view('admin/property/refund');

    }
    // 退费详情
    public function refund_details(Request $request)
    {
        $studentTuition = \DB::table('refund')
            ->join('students', 'refund.CardNo', '=', 'students.CardNo')
            ->join('charge', 'refund.CardNo', '=', 'charge.CardNo')
            ->get();
        return view('admin/property/refund_details', ['studentTuition' => $studentTuition]);
    }

    // 修改退费方法
    public function edit_refund(Request $request,$id)
    {
        $card = Refund::where('id', $id)->pluck('CardNo')[0];
        $charge_msg = Charge::where('CardNo', $card)->first();
        $student_msg = Student::where('CardNo', $card)->first();
        $refund_msg = Refund::find($id);
        if ($request->isMethod('post')){
            $res = $request->except('_token');
            $res['refund_date'] = strtotime( $res['refund_date']);
            $result = Refund::where('id', $id)->update($res);
            if ($result) {
                return redirect()->back()->with('success', '修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/property/edit_refund', ['refund_msg' => $refund_msg, 'charge_msg' => $charge_msg, 'student_msg' => $student_msg]);
    }

    // 删除退费
    public function delete_refund(Request $request)
    {
        $id = $request->input('id');
        $res = Refund::where('id', $id)->delete();
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

    // 欠费管理
    public function arrears()
    {
        $arrearsMsgs = \DB::table('students')->join('arrears', 'arrears.CardNo', '=', 'students.CardNo')->get();
        return view('admin/property/arrears', ['arrearsMsgs' => $arrearsMsgs]);
    }
    
    // 添加欠费
    public function add_arrears(Request $request)
    {
        if ($request->isMethod('post')) {
            $card = $request->input('CardNo');
            $studentMsg = Student::where('CardNo', $card)->first();
            $tuition_standard = Charge::where('CardNo', $card)->first()->tuition_standard;
            $studentMsg['tuition_standard'] = $tuition_standard;
            return view('admin/property/add_arrears', ['studentMsg' => $studentMsg]);
        }
        return view('admin/property/add_arrears');
    }
    
    // 插入记录
    public function insert_arrears(Request $request)
    {
        if ($request->isMethod('post')) {
            $res = $request->except('_token');
            if (Arrears::create($res)){
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/property/add_arrears');
    }
    
    // 编辑欠费记录
    public function edit_arrears(Request $request, $id)
    {
        $arrearsMsg = Arrears::find($id);
        $studentMsg = Student::where('CardNo', $arrearsMsg->CardNo)->first();
        if($request->isMethod('post')) {
            $editMsgs = $request->except('_token');
            $res = Arrears::where('id', $id)->update($editMsgs);
            if ($res) {
                return redirect()->back()->with('success', '修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/property/edit_arrears', ['arrearsMsg' => $arrearsMsg, 'studentMsg' => $studentMsg ]);
    }

    // 删除欠费记录
    public function delete_arrears(Request $request)
    {
        $id = $request->input('id');
        $delMsg = Arrears::where('id', $id)->delete();
        if ($delMsg) {
            $data['state'] = 200;
            $data['message'] = '删除成功';
            return $data;
        } else {
            $data['state'] = 0;
            $data['message'] = '删除失败';
            return $data;
        }
    }

    // 收入统计
    public function income()
    {
        $finances = Finance::where('status', 1)->get();
        return view('admin/property/income', ['finances' => $finances]);
    }

    // 收入录入
    public function add_income(Request $request)
    {
        if($request->isMethod('post')) {
            $res = $request->except('_token');
            $total_num = Finance::pluck('total_num');
            $is_ha = $total_num[count($total_num)-1];
            $unit_price = array($res['unit_price1'],$res['unit_price2'],$res['unit_price3'],$res['unit_price4']);
            $moneyMsgs['payment_unit'] = $res['payment_unit'];
            $moneyMsgs['handle_person'] = $res['handle_person'];
            $moneyMsgs['bill_number'] = $res['bill_number'];
            $moneyMsgs['invoice_number'] = $res['invoice_number'];
            $moneyMsgs['collection_date'] = strtotime($res['collection_date']);
            $moneyMsgs['payment_method'] = $res['payment_method'];
            $moneyMsgs['remarks'] = $res['remarks'];
            $moneyMsgs['abstract'] = json_encode($res['abstract']);
            $moneyMsgs['number'] = json_encode($res['number']);
            $moneyMsgs['unit'] = json_encode($res['unit']);
            $moneyMsgs['unit_price'] = json_encode($unit_price);
            $moneyMsgs['total'] = $res['total'];
            $moneyMsgs['drawer'] = $res['drawer'];
            $moneyMsgs['payee'] = $res['payee'];
            $moneyMsgs['collecting_unit'] = $res['collecting_unit'];
            $moneyMsgs['collecting_date'] = strtotime($res['collecting_date']);
            $moneyMsgs['total_money'] = $res['number']['0'] * str_replace(',', '', $res['unit_price1']) + $res['number']['1'] * str_replace(',', '', $res['unit_price2']) + $res['number']['2'] * str_replace(',', '', $res['unit_price3']) + $res['number']['3'] * str_replace(',', '', $res['unit_price4']);
            if($is_ha){
                $is_ha += $moneyMsgs['total_money'];
            }else {
                $is_ha = $moneyMsgs['total_money'];
            }
            $moneyMsgs['total_num'] = $is_ha;
            if(Finance::create($moneyMsgs)) {
                return redirect()->back()->with('success','添加成功');
            } else {
                return redirect()->back()->with('error','未知错误');
            }
        }
        return view('admin/property/add_income');
    }

    // 查看方法
    public function show_income($id)
    {
        $income = Finance::find($id);
        $income['abstract'] = json_decode($income['abstract']);
        $income['number'] = json_decode($income['number']);
        $income['unit'] = json_decode($income['unit']);
        $income['unit_price'] = json_decode($income['unit_price']);
        return view('admin/property/show_income', ['income' => $income]);
    }

    // 修改收入统计
    public function edit_income(Request $request, $id)
    {
        $income = Finance::find($id);
        $income['abstract'] = json_decode($income['abstract']);
        $income['number'] = json_decode($income['number']);
        $income['unit'] = json_decode($income['unit']);
        $income['unit_price'] = json_decode($income['unit_price']);
        if ($request->isMethod('post')) {
            $res = $request->except('_token');
            $unit_price = array($res['unit_price1'],$res['unit_price2'],$res['unit_price3'],$res['unit_price4']);
            $moneyMsgs['payment_unit'] = $res['payment_unit'];
            $moneyMsgs['handle_person'] = $res['handle_person'];
            $moneyMsgs['bill_number'] = $res['bill_number'];
            $moneyMsgs['invoice_number'] = $res['invoice_number'];
            $moneyMsgs['collection_date'] = strtotime($res['collection_date']);
            $moneyMsgs['payment_method'] = $res['payment_method'];
            $moneyMsgs['remarks'] = $res['remarks'];
            $moneyMsgs['abstract'] = json_encode($res['abstract']);
            $moneyMsgs['number'] = json_encode($res['number']);
            $moneyMsgs['unit'] = json_encode($res['unit']);
            $moneyMsgs['unit_price'] = json_encode($unit_price);
            $moneyMsgs['total'] = $res['total'];
            $moneyMsgs['drawer'] = $res['drawer'];
            $moneyMsgs['payee'] = $res['payee'];
            $moneyMsgs['collecting_unit'] = $res['collecting_unit'];
            $moneyMsgs['collecting_date'] = strtotime($res['collecting_date']);
            $editMsg = Finance::where('id', $id)->update($moneyMsgs);
            if ($editMsg) {
                return redirect()->back()->with('success','修改成功');
            } else {
                return redirect()->back()->with('error','修改失败');
            }
        }
        return view('admin/property/edit_income', ['income' => $income]);
    }
    
    // 删除收入统计
    public function delete_income(Request $request)
    {
        $id = $request->input('id');
        $res = Finance::where('id', $id)->delete();
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
    
    // 格式化钱数
    public function money_format(Request $request)
    {
        $money = $request->input('money');
        $number = $request->input('number');
        if ($number > 1) {
            $moneys = $money * $number;
            $a['one'] =  number_format($money,2);
            $a['two'] =  number_format($moneys,2);
            return json_encode($a);
        } else {
            $a['one'] =  number_format($money,2);
            return json_encode($a);
     }
    }



    // 支出统计
    public function expenditure()
    {
        $finances = Finance::where('status', 2)->get();
        return view('admin/property/expenditure', ['finances' => $finances]);
    }
    //支出凭证
    public function add_expenditure(Request $request)
    {
        if($request->isMethod('post')) {
            $res = $request->except('_token');
            $total_num = Finance::pluck('total_num');
            $is_ha = $total_num[count($total_num)-1];
            $unit_price = array($res['unit_price1'],$res['unit_price2'],$res['unit_price3'],$res['unit_price4']);
            $moneyMsgs['payment_unit'] = $res['payment_unit'];
            $moneyMsgs['handle_person'] = $res['handle_person'];
            $moneyMsgs['bill_number'] = $res['bill_number'];
            $moneyMsgs['invoice_number'] = $res['invoice_number'];
            $moneyMsgs['collection_date'] = strtotime($res['collection_date']);
            $moneyMsgs['payment_method'] = $res['payment_method'];
            $moneyMsgs['remarks'] = $res['remarks'];
            $moneyMsgs['abstract'] = json_encode($res['abstract']);
            $moneyMsgs['number'] = json_encode($res['number']);
            $moneyMsgs['unit'] = json_encode($res['unit']);
            $moneyMsgs['unit_price'] = json_encode($unit_price);
            $moneyMsgs['total'] = $res['total'];
            $moneyMsgs['drawer'] = $res['drawer'];
            $moneyMsgs['payee'] = $res['payee'];
            $moneyMsgs['collecting_unit'] = $res['collecting_unit'];
            $moneyMsgs['collecting_date'] = strtotime($res['collecting_date']);
            $moneyMsgs['status'] = 2;
            $moneyMsgs['total_money'] = $res['number']['0'] * str_replace(',', '', $res['unit_price1']) + $res['number']['1'] * str_replace(',', '', $res['unit_price2']) + $res['number']['2'] * str_replace(',', '', $res['unit_price3']) + $res['number']['3'] * str_replace(',', '', $res['unit_price4']);
            if($is_ha){
                $is_ha -= $moneyMsgs['total_money'];
                $moneyMsgs['total_num'] = $is_ha;
            }

            if(Finance::create($moneyMsgs)) {
                return redirect()->back()->with('success','添加成功');
            } else {
                return redirect()->back()->with('error','未知错误');
            }
        }
        return view('admin/property/add_expenditure');
    }

    // 编辑支出方法
    public function edit_expenditure(Request $request, $id)
    {
        $expenditure = Finance::find($id);
        $expenditure['abstract'] = json_decode($expenditure['abstract']);
        $expenditure['number'] = json_decode($expenditure['number']);
        $expenditure['unit'] = json_decode($expenditure['unit']);
        $expenditure['unit_price'] = json_decode($expenditure['unit_price']);
        if ($request->isMethod('post')) {
            $res = $request->except('_token');
            $unit_price = array($res['unit_price1'],$res['unit_price2'],$res['unit_price3'],$res['unit_price4']);
            $moneyMsgs['payment_unit'] = $res['payment_unit'];
            $moneyMsgs['handle_person'] = $res['handle_person'];
            $moneyMsgs['bill_number'] = $res['bill_number'];
            $moneyMsgs['invoice_number'] = $res['invoice_number'];
            $moneyMsgs['collection_date'] = strtotime($res['collection_date']);
            $moneyMsgs['payment_method'] = $res['payment_method'];
            $moneyMsgs['remarks'] = $res['remarks'];
            $moneyMsgs['abstract'] = json_encode($res['abstract']);
            $moneyMsgs['number'] = json_encode($res['number']);
            $moneyMsgs['unit'] = json_encode($res['unit']);
            $moneyMsgs['unit_price'] = json_encode($unit_price);
            $moneyMsgs['total'] = $res['total'];
            $moneyMsgs['drawer'] = $res['drawer'];
            $moneyMsgs['payee'] = $res['payee'];
            $moneyMsgs['collecting_unit'] = $res['collecting_unit'];
            $moneyMsgs['collecting_date'] = strtotime($res['collecting_date']);
            $editMsg = Finance::where('id', $id)->update($moneyMsgs);
            if ($editMsg) {
                return redirect()->back()->with('success','修改成功');
            } else {
                return redirect()->back()->with('error','修改失败');
            }
        }
        return view('admin/property/edit_expenditure', ['expenditure' => $expenditure]);
    }

    // 日记账
    public function diary(Request $request)
    {
        $diaryMsgs = Finance::orderBy('created_at', 'desc')->get();
        if ($request->isMethod('post')) {
            $date = $request->except('_token');
            $date1 = strtotime($date['date1']);
            $date2 = strtotime($date['date2']);
            $diaryMsgs = Finance::whereBetween('created_at', [$date1, $date2])->get();
            return view('admin/property/diary', ['diaryMsgs' => $diaryMsgs]);
        }
        return view('admin/property/diary', ['diaryMsgs' => $diaryMsgs]);
    }
    
    // 打印
    public function print_income($id)
    {
        $income = Finance::find($id);
        $income['abstract'] = json_decode($income['abstract']);
        $income['number'] = json_decode($income['number']);
        $income['unit'] = json_decode($income['unit']);
        $income['unit_price'] = json_decode($income['unit_price']);
        return view('admin/property/print_income', ['income' => $income]);
    }


}
