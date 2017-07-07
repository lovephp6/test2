<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('admin/admin/index', ['admins' => $admins]);
    }

    public function add()
    {
        return view('admin/admin/add');
    }
}
