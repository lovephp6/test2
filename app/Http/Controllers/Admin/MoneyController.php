<?php

namespace App\Http\Controllers\Admin;

use App\Model\College;
use App\Model\Lschool;
use App\Model\Major;
use App\Model\Money;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MoneyController extends Controller
{
    public function index()
    {
        $moneys = Money::all();
        return view('admin/money/index', compact('moneys'));
    }

    public function add(Request $request)
    {
        $colleges = College::orderBy('sort', 'desc')->get();
        if ($request->isMethod('post')) {
            $moneys = $request->except('_token');
            $moneys['school_name'] = College::where('id',$moneys['school_name'])->first()['school_name'];
            $moneys['major_name'] = Major::where('id',$moneys['major_name'])->first()['major_name'];
            $moneys['major_date'] = Lschool::where('id',$moneys['major_date'])->first()['major_date'];
            if (Money::create($moneys)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/money/add',compact(['colleges']));
    }

    public function getmajor(Request $request)
    {
        $college_id = $request->input('college_id');
        $majorMsgs =  Major::where('college_id', '=', $college_id)->get();
        return $majorMsgs;
    }

    public function getxuezhi(Request $request)
    {
        $major_id = $request->input('major_id');
        $majorMsgs =  Lschool::where('major_id', '=', $major_id)->get();
        return $majorMsgs;
    }

    public function getmoney(Request $request)
    {
        $major_name = $request->input('major_name');
        $major_date = $request->input('major_date');
        $payment_period = $request->input('payment_period');
        $moneys = Money::where(['major_name' => $major_name, 'major_date' => $major_date, 'payment_period' => $payment_period])->get();
        return $moneys;
    }
}
