<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', ['uses' => 'Admin\IndexController@index']);

Auth::routes();

Route::group(['middleware'=>'auth','prefix' => 'admin', 'namespace' => 'Admin'], function(){
//Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    /**
     *  角色
     */
    Route::any('role/add', ['uses' => 'RoleController@add']);
    Route::any('role/index', ['uses' => 'RoleController@index']);
    Route::any('role/edit/{id}', ['uses' => 'RoleController@edit']);
    Route::any('role/delete', ['uses' => 'RoleController@delete']);

    // 权限
    Route::any('permission/index', ['uses' => 'PermissionController@index']);
    Route::any('permission/add', ['uses' => 'PermissionController@add']);
    Route::any('permission/edit/{id}', ['uses' => 'PermissionController@edit']);
    Route::any('permission/delete', ['uses' => 'PermissionController@delete']);

    // 学籍管理
    Route::get('school/index', ['uses' => 'SchoolController@index']);
    Route::any('school/add', ['uses' => 'SchoolController@add']);
    //修改
    Route::any('school/edit/{id}', ['uses' => 'SchoolController@edit']);
    // 删除
    Route::any('school/delete', ['uses' => 'SchoolController@delete']);
    // 查看详情

    Route::any('school/show/{id}', ['uses' => 'SchoolController@show']);
    Route::any('school/certificate', ['uses' => 'SchoolController@certificate']);
    Route::any('school/certificate_edit/{id}', ['uses' => 'SchoolController@certificate_edit']);
    Route::any('school/certificate_delete', ['uses' => 'SchoolController@certificate_delete']);
    // 获取证书学生信息
    Route::any('school/management', ['uses' => 'SchoolController@management']);
    // 添加学生证书
    Route::any('school/add_management', ['uses' => 'SchoolController@add_management']);
    Route::any('school/students_card', ['uses' => 'SchoolController@students_card']);
    Route::any('school/students_zheng', ['uses' => 'SchoolController@students_zheng']);
    // 上传附件
    Route::any('school/students_img', ['uses' => 'SchoolController@students_img']);
    // 学历管理
    Route::any('school/education', ['uses' => 'SchoolController@education']);
    Route::any('school/add_education', ['uses' => 'SchoolController@add_education']);
    // 查看学历
    Route::get('school/edu_show/{id}', ['uses' => 'SchoolController@edu_show']);
    // 修改学历
    Route::any('school/edu_edit/{id}', ['uses' => 'SchoolController@edu_edit']);
    // 删除学历
    Route::post('school/edu_delete', ['uses' => 'SchoolController@edu_delete']);
    // 证书管理


//    Route::group(['middleware' => ['role:sdsd']], function(){
        //财务管理
        //收费管理
        Route::any('property/tuition_fee', ['uses' => 'PropertyController@tuition_fee']);
        // 收费统计
        Route::any('property/total_money', ['uses' => 'PropertyController@total_money']);
        // 加入方法
        Route::post('property/add_tuition_fee', ['uses' => 'PropertyController@add_tuition_fee']);
        // 修改方法
        Route::any('property/edit_tuition_fee/{id}', ['uses' => 'PropertyController@edit_tuition_fee']);
        // 删除收费统计方法
        Route::any('property/delete_tuition_fee', ['uses' => 'PropertyController@delete_tuition_fee']);
        // 收费发票
        Route::any('property/shouju/{id}', ['uses' => 'PropertyController@shouju']);
        // 退还学费
        Route::any('property/refund', ['uses' => 'PropertyController@refund']);
        // 退费查询学生信息
        Route::any('property/refund_stu_msg', ['uses' => 'PropertyController@refund_stu_msg']);
        // 退费详情
        Route::any('property/refund_details', ['uses' => 'PropertyController@refund_details']);
        // 编辑退费
        Route::any('property/edit_refund/{id}', ['uses' => 'PropertyController@edit_refund']);
        // 删除退费
        Route::any('property/delete_refund', ['uses' => 'PropertyController@delete_refund']);
        //  欠费管理
        Route::any('property/arrears', ['uses' => 'PropertyController@arrears']);
        // 添加欠费
        Route::any('property/add_arrears', ['uses' => 'PropertyController@add_arrears']);
        Route::any('property/insert_arrears', ['uses' => 'PropertyController@insert_arrears']);
        // 修改方法
        Route::any('property/edit_arrears/{id}', ['uses' => 'PropertyController@edit_arrears']);
        // 删除方法
        Route::any('property/delete_arrears', ['uses' => 'PropertyController@delete_arrears']);
        // 收入统计
        Route::any('property/income', ['uses' => 'PropertyController@income']);
        // 收入凭证
        Route::any('property/add_income', ['uses' => 'PropertyController@add_income']);
        // 查看
        Route::any('property/show_income/{id}', ['uses' => 'PropertyController@show_income']);
        // 修改方法
        Route::any('property/edit_income/{id}', ['uses' => 'PropertyController@edit_income']);
        // 删除收入凭证
        Route::any('property/delete_income', ['uses' => 'PropertyController@delete_income']);
        // ajax处理钱数
        Route::post('property/money_format', ['uses' => 'PropertyController@money_format']);
        //支出凭证
        Route::any('property/add_expenditure', ['uses' => 'PropertyController@add_expenditure']);
        // 编辑支出
        Route::any('property/edit_expenditure/{id}',['uses' => 'PropertyController@edit_expenditure']);
        // 支出统计
        Route::any('property/expenditure', ['uses' => 'PropertyController@expenditure']);
        // 日记账
        Route::any('property/diary', ['uses' => 'PropertyController@diary']);
        // 打印页
        Route::get('property/print_income/{id}', ['uses' => 'PropertyController@print_income']);

        // 添加日记账
        Route::any('property/add_diary', ['uses' => 'PropertyController@add_diary']);
//    });


    /**
     *   人事管理
     */
    Route::any('personnel/staff', ['uses' => 'PersonnelController@staff']);
    Route::any('personnel/add_staff', ['uses' => 'PersonnelController@add_staff']);
    // 添加入职信息
    Route::post('personnel/add_entry', ['uses' => 'PersonnelController@add_entry']);
    // 添加工资信息
    Route::post('personnel/add_wages', ['uses' => 'PersonnelController@add_wages']);
    // 添加保险信息
    Route::post('personnel/add_safe', ['uses' => 'PersonnelController@add_safe']);
    // 添加账户信息
    Route::post('personnel/add_account', ['uses' => 'PersonnelController@add_account']);
    // 添加离职信息
    Route::post('personnel/add_quit', ['uses' => 'PersonnelController@add_quit']);
    Route::any('personnel/edit_staff/{id}', ['uses' => 'PersonnelController@edit_staff']);
    Route::any('personnel/show_staff/{id}', ['uses' => 'PersonnelController@show_staff']);
    Route::any('personnel/delete_staff', ['uses' => 'PersonnelController@delete_staff']);

    // 工资表
    Route::any('personnel/payroll', ['uses' => 'PersonnelController@payroll']);
    Route::post('personnel/delete_payroll', ['uses' => 'PersonnelController@delete_payroll']);
    // 出勤录入
    Route::any('personnel/attendance', ['uses' => 'PersonnelController@attendance']);

});


