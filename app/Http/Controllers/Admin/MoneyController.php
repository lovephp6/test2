<?php

namespace App\Http\Controllers\Admin;

use App\Model\College;
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
            if (Money::create($moneys)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/money/add',compact(['colleges']));
    }
}
