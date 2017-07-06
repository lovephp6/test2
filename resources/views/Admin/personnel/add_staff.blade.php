@extends('layouts.head')

@section('contents')
    <style>
        .bgw {
            line-height: 40px !important;
        }
        .in_bgw {
            color:#888 !important;
        }
        .con_color{
            color:#FFF !important;
        }
        .stepy-titles li.current-step div{
            background:#FF6C60;
        }

        .shade {
            position: absolute;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.55);
        }

        .shade div {
            width: 300px;
            height: 200px;
            line-height: 200px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -150px;
            background: white;
            border-radius: 5px;
            text-align: center;
        }

        .a-upload {
            padding: 4px 10px;
            height: 60px;

            line-height: 50px;
            position: relative;
            cursor: pointer;
            color: #888;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            display: inline-block;
            *display: inline;
            *zoom: 1
        }

        .a-upload input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer
        }

        .a-upload:hover {
            color: #444;
            background: #eee;
            border-color: #ccc;
            text-decoration: none
        }
        .img_div{min-height: 100px; min-width: 100px;}
        .isImg{width: 120px; height: 120px; position: relative; float: left; margin-left: 10px;}
        .removeBtn{position: absolute; top: 0; right: 0; z-index: 11; border: 0px; border-radius: 50px; background: red; width: 22px; height: 22px; color: white;}
        .shadeImg{position: absolute;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 15;
            text-align: center;
            background: rgba(0, 0, 0, 0.55);}
        .showImg{width: 400px; height: 500px; margin-top: 140px;}

    </style>
    <script language="JavaScript">



        function connect() {
            clearForm();
            var CVR_IDCard = document.getElementById("plugin");
            var ret = CVR_IDCard.connect();
            document.all['ret'].innerHTML = ret;
            ret = JStrToObj(ret);
            DisplayInfo(ret);
            return;
        }

        function getStatus() {
            clearForm();
            var CVR_IDCard = document.getElementById("plugin");
            var ret = CVR_IDCard.getStatus();
            document.all['ret'].innerHTML = ret;
            ret = JStrToObj(ret);
            DisplayInfo(ret);
            return;
        }

        function readCert() {
            clearForm();
            var CVR_IDCard = document.getElementById("plugin");
            var ret = CVR_IDCard.readCert();
            document.all['ret'].innerHTML = ret;
            ret = JStrToObj(ret);
            if (ret.resultFlag==-1){
                DisplayInfo(ret);
            }else{
                fillForm(ret);
            }
        }


        function disconnect() {
            clearForm();
            var CVR_IDCard = document.getElementById("plugin");
            var ret = CVR_IDCard.disconnect();
            document.all['ret'].innerHTML = ret;
            ret = JStrToObj(ret);
            DisplayInfo(ret);
            return;
        }

        function ReadIDCard() {
            var CVR_IDCard = document.getElementById("plugin");
            var ret = JStrToObj(CVR_IDCard.connect());

            if (ret.resultFlag==-1){
                clearForm();
                DisplayInfo(ret);
                return;
            }

            ret = JStrToObj(CVR_IDCard.readCert());
            if (ret.resultFlag==-1){
                clearForm();
                DisplayInfo(ret);
            }else{
                fillForm(ret);
            }

            ret = JStrToObj(CVR_IDCard.disconnect());
            if (ret.resultFlag==-1){
                DisplayInfo(ret);
                return;
            }


        }

        function JStrToObj(str){
            return eval("(" + str + ")");
        }

        function DisplayInfo(ret){
            if (ret.resultFlag==0){
                document.all['errorMsg'].style.color = 'Green';
            }else{
                document.all['errorMsg'].style.color = 'Red';
            }

            document.all['resultFlag'].innerHTML = ret.resultFlag;
            document.all['errorMsg'].innerHTML = ret.errorMsg;

            if (ret.status!=null)
                document.all['status'].innerHTML = ret.status
            else
                document.all['status'].innerHTML = "";

        }

        function fillForm(ret) {
            DisplayInfo(ret);
            var pName=ret.resultContent.partyName;
            var pSex=ret.resultContent.gender;
            var pNation=ret.resultContent.nation;
            var pBorn=ret.resultContent.bornDay;
            var pAddress=ret.resultContent.certAddress;
            var pCardNo=ret.resultContent.certNumber;
            var pPolice=ret.resultContent.certOrg;
            var pActivityLFrom=ret.resultContent.effDate;
            var pActivityLTo=ret.resultContent.expDate;

            if(pSex == 1) {
                pSex =  '男';
            }else{
                pSex =  '女';
            }

            var y = pBorn.substr(0,4);
            var m = pBorn.substr(4,2);
            var d = pBorn.substr(6,2);
            pBorn = y+'-'+m+'-'+d;

            var fy = pActivityLFrom.substr(0,4);
            var fm = pActivityLFrom.substr(4,2);
            var fd = pActivityLFrom.substr(6,2);
            pf = fy+'.'+fm+'.'+fd;

            var toy = pActivityLTo.substr(0,4);
            var tom = pActivityLTo.substr(4,2);
            var tod = pActivityLTo.substr(6,2);
            pto = toy+'.'+tom+'.'+tod;

            document.all['staff_name'].value = pName;
            document.all['staff_sex'].value = pSex;
            document.all['staff_nation'].value = pNation+'族';
            document.all['staff_born'].value = pBorn;
            document.all['staff_address'].value = pAddress;
            document.all['staff_card'].value = pCardNo;
            document.all['staff_police'].value = pPolice;
            document.all['ActivityLFrom'].value = pActivityLFrom;
            document.all['ActivityLTo'].value = pActivityLTo;
            /* 加的 */

            document.all['staff_qixian'].value = pf+' -- '+pto;
            document.all['resultFlag'].innerHTML = ret.resultFlag;
            document.all['errorMsg'].innerHTML = ret.errorMsg;
            if (ret.status!=null)
                document.all['status'].innerHTML = ret.status
            else
                document.all['status'].innerHTML = "";

            document.all['photoes'].src = "data:image/jpg;base64," + ret.resultContent.cardHimg;
            document.all['filename'].value = "data:image/jpg;base64," + ret.resultContent.cardHimg;
            document.all['Base64Jpg1Display'].src = "data:image/jpg;base64," + ret.resultContent.cardFimg;
            document.all['Base64Jpg2Display'].src = "data:image/jpg;base64," + ret.resultContent.cardBimg;
            document.all['Base64Jpg3Display'].src = "data:image/jpg;base64," + ret.resultContent.cardAimg;
        }

        function clearForm() {
            document.all['staff_name'].value = '';
            document.all['staff_sex'].value = '';
            document.all['staff_nation'].value = '';
            document.all['staff_born'].value = '';
            document.all['staff_address'].value = '';
            document.all['staff_card'].value = '';
            document.all['staff_police'].value = '';
            document.all['ActivityLFrom'].value = '';
            document.all['ActivityLTo'].value = '';

            document.all['resultFlag'].innerHTML = '';
            document.all['errorMsg'].innerHTML = '';
            document.all['status'].innerHTML = '';
            document.all['ret'].innerHTML = '';

            document.all['Base64Jpg0Display'].src = "";
            document.all['Base64Jpg1Display'].src = "";
            document.all['Base64Jpg2Display'].src = "";
            document.all['Base64Jpg3Display'].src = "";
        }



    </script>

    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <section class="panel">
                <header class="panel-heading">
                    <span class="label label-primary"><a href="{{ url('admin/personnel/staff') }}" style="color:#FFF;">　　职工档案　　</a></span>　
                    <span class="label label-danger"><a href="{{ url('admin/personnel/add_staff') }}" style="color:#FFF;">　　员工入职　　</a></span>
                    <div class="pull-right">
                        <tr>
                            <td align="right"></td>
                            <td><font id="errorMsg"></font></td>
                        </tr>
                        <tr class="con_color">
                            <td>&nbsp;</td>
                            <td><input type="button" class="btn btn-info"  name="connect" style="height:30px;font-size:12px;font-weight:bold;" value="　连接设备　" onclick="connect()"></td>　
                            {{--<td><button name="readCert" class="btn btn-primary">读取数据</button></td>--}}
                            {{--<td><input type="button" name="getStatus" value="连接状态" onclick="getStatus()"></td>--}}
                            <td><input type="button" class="btn btn-info" name="readCert" style="height:30px;font-size:12px;font-weight:bold;" value="　读取数据　" onclick="readCert()"></td>
                            {{--<td><input type="button" name="disconnect" value="disconnect" onclick="disconnect()"></td>--}}
                        </tr>
                    </div>
                </header><div class="panel" >
                    <section class="panel col-md-12">
                        <header class="panel-heading tab-bg-dark-navy-blue" style="background: #41cac0;font-weight: bold">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#xsxk">　员工档案　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#xszs">　入职信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#pxzs">　工资信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#jyzs">　保险信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#scfj">　账户信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#lzxx">　离职信息　</a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="xsxk" class="tab-pane active">
                                    <div class="panel-body">
                                        <object type="application/cert-reader"  id="plugin" width=0 height=0> </object>
                                        @include('layouts.notice')
                                        <form id="default" class="form-horizontal" action="" method="post">
                                            {{--<fieldset title="基本信息" class="step" id="default-step-0" style="display: block;">--}}
                                            {{--<legend></legend>--}}

                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tbody>
                                                {{ csrf_field() }}
                                                <tr class="text-center">
                                                    <td colspan="7" style="font-weight: bold;">基本信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num" value="{{ old('staff_num') }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_name" value="{{ old('staff_name') }}"></td>
                                                    <td class="bgw">性　　别</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_sex" value="{{ old('staff_sex') }}"></td>
                                                    <td class="bgw">民　　族</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_nation"></td>
                                                    <td class="bgw" rowspan="4">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <input type="hidden" name="photo" id="filename" value="">
                                                            <div class="fileupload-new thumbnail">
                                                                <!-- <img src="" alt="" id="photoes">-->
                                                                <img src="{{ asset('admin/img/phtots_moren.jpg') }}" alt="" id="photoes" style="width:120px;height:150px;">
                                                            </div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" id="files" style="line-height: 10px;">
                                                            </div>
                                                            <div>
                                                                    <span class="btn btn-white btn-file">
                                                                      <span class="fileupload-new">
                                                                        <i class="fa fa-paper-clip">
                                                                        </i>
                                                                        上传照片
                                                                      </span>
                                                                      <span class="fileupload-exists">
                                                                        <i class="fa fa-undo">
                                                                        </i>
                                                                        换一张
                                                                      </span>
                                                                      <input type="file" class="default">
                                                                    </span>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                                                                    <i class="fa fa-trash">
                                                                    </i>
                                                                    删除
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">出生日期</td>
                                                    <td class="bgw">
                                                        <input name="staff_born" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">籍　　贯</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_origin"></td>
                                                    <td class="bgw">婚姻状况</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_marriage"></td>
                                                    {{--<td class="bgw">身份证号</td>--}}
                                                    {{--<td class="bgw" colspan="3">--}}
                                                        {{--<input class="form-control in_bgw" type="text" name="CardNo">--}}
                                                    {{--</td>--}}
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">政治面貌</td>
                                                    <td class="bgw">
                                                        <input name="staff_political" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">身　　高</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_height"></td>
                                                    <td class="bgw">体　　重</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_weight"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">手机号码</td>
                                                    <td class="bgw">
                                                        <input name="staff_phone" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">电子邮箱</td>
                                                    <td class="bgw" colspan="3"><input type="text" class="form-control in_bgw" name="staff_email"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">证件类型</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_certType" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">证件号码</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_card"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">毕业院校</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_school" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">专　　业</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_major"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">毕业日期</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_graduationDate" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">学　　历</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_edu"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户口性质</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_regResidence" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">管辖机关</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_domination"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户籍地址</td>
                                                    <td class="bgw" colspan="6"><input name="staff_address" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">证件期限</td>
                                                    <td class="bgw" colspan="6"><input name="staff_qixian" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="4" style="font-weight: bold;">家庭成员</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw">关　　系</td>
                                                    <td class="bgw">工作单位</td>
                                                    <td class="bgw">联系电话</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_parents_name[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_parents_relationship[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_parents_company[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_parents_phone[]" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_parents_name[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_parents_relationship[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_parents_company[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_parents_phone[]" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="3" style="font-weight: bold;">教育经历</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">起止日期</td>
                                                    <td class="bgw">院校名称</td>
                                                    <td class="bgw">专　　业</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_school[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_school_name[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_major_school[]" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_school[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_school_name[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_major_school[]" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="3" style="font-weight: bold;">工作经历</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">起止日期</td>
                                                    <td class="bgw">单位名称</td>
                                                    <td class="bgw">职　　务</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_work[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_unitName[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_post[]" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_work[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_unitName[]" type="text" class="form-control in_bgw"></td>
                                                    <td><input name="staff_post[]" type="text" class="form-control in_bgw"></td>
                                                </tr>
                                            </table>
                                           <br>
                                            <center>
                                                <button class="btn btn-info" id="tijiao" style="width:200px;">提交</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                                <div id="xszs" class="tab-pane"><div class="panel-body">
                                        @include('layouts.notice')
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_entry') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">入职信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">部　　门</td>
                                                    <td class="bgw">
                                                        <input name="staff_department" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">职　　务</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_postNew"></td>
                                                    <td class="bgw">聘用形式</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_employ"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">入职日期</td>
                                                    <td class="bgw">
                                                        <input name="staff_entryDate" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">合同日期</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_contractDate"></td>
                                                    <td class="bgw">合同期限</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_contractPeriod"></td>
                                                </tr>
                                            </table>
                                            <br>
                                            <center>
                                                <button class="btn btn-info" style="width:200px;">提交</button>
                                            </center>
                                        </form>
                                    </div></div>
                                <div id="pxzs" class="tab-pane"><div class="panel-body">
                                        @include('layouts.notice')
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_wages') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">工资信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">试用工资</td>
                                                    <td class="bgw">
                                                        <input name="staff_probation" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">转正工资</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_full"></td>
                                                    <td class="bgw">工龄工资</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_seniority"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td colspan="6">补助项目</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">餐食补助</td>
                                                    <td class="bgw">
                                                        <input name="staff_meal" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">交通补助</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_traffic"></td>
                                                    <td class="bgw">通信补助</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_communication"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">出差补助</td>
                                                    <td class="bgw">
                                                        <input name="staff_travel" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">加班补助</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_overtime"></td>
                                                    <td class="bgw">绩效奖金</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_achievements"></td>
                                                </tr>
                                            </table>
                                            <br>
                                            <center>
                                                <button class="btn btn-info" style="width:200px;">提交</button>
                                            </center>
                                        </form>
                                    </div></div>
                                <div id="jyzs" class="tab-pane"><div class="panel-body">
                                        @include('layouts.notice')
                                        <form class="form-horizontal" role="form" method="post" action="{{ url('admin/personnel/add_safe') }}">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">保险信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control" name="staff_num"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">保险状态</td>
                                                    <td class="bgw">
                                                        <input name="staff_insurance" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">社　　保</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_social"></td>
                                                    <td class="bgw">公 积 金</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_fund"></td>
                                                </tr>
                                            </table>
                                            <br>
                                            <center>
                                                <button class="btn btn-info" style="width:200px;">提交</button>
                                            </center>
                                        </form>
                                    </div></div>
                                <div id="scfj" class="tab-pane">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_account') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">账户信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">开 户 行</td>
                                                    <td class="bgw">
                                                        <input name="staff_bank" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">户　　名</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_bankName"></td>
                                                    <td class="bgw">账　　号</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_bankNumber"></td>
                                                </tr>
                                            </table>
                                            <br>
                                            <center>
                                                <button class="btn btn-info" style="width:200px;">提交</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                                <div id="lzxx" class="tab-pane">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_quit') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">离职信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">离职日期</td>
                                                    <td class="bgw">
                                                        <input name="staff_leaveDate" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">离职类型</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_leaveType"></td>
                                                    <td class="bgw">离职原因</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_leaveReason"></td>
                                                </tr>
                                            </table>
                                            <br>
                                            <center>
                                                <button class="btn btn-info" style="width:200px;">提交</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                                <div id="contact" class="tab-pane">Contact</div>
                            </div>
                        </div>
                    </section>
                </div>

            </section>
        </section>



        <div style="display:none">

            <div border="0" width="100%" cellpadding="0" cellspacing="0">

                <tr>
                    <td align="right">姓名：</td>
                    <td><input type="text" name="" size="49">(要求中间，两头都没有空格)</td>
                </tr>

                <tr>
                    <td align="right">性别：</td>
                    <td><input type="text" name="" size="49">(取值为“1”（表示“男”）或“0”（表示“女”）)</td>
                </tr>

                <tr>
                    <td align="right">民族：</td>
                    <td><input type="text" name="" size="49">(汉字即可)</td>
                </tr>

                <tr>
                    <td align="right">出生：</td>
                    <td><input type="text" name="" size="49">(要求格式为:yyyyMMdd，长度为8)</td>
                </tr>

                <tr>
                    <td align="right">地址：</td>
                    <td><input type="text" name="" size="49"></td>
                </tr>


                <tr>
                    <td align="right">身份证号：</td>
                    <td><input type="text" name="" size="49" style="color: #FF0000">(居民身份号码，长度18位)</td>
                </tr>


                <tr>
                    <td align="right">签发机关：</td>
                    <td><input type="text" name="Police" size="49"></td>
                </tr>

                <tr>
                    <td align="right">期限起始：</td>
                    <td><input type="text" name="ActivityLFrom" size="49">(要求格式为:yyyyMMdd，长度为8)</td>
                </tr>


                <tr>
                    <td align="right">期限失效：</td>
                    <td><input type="text" name="ActivityLTo" size="49">(要求格式为:yyyyMMdd，长度为8)</td>
                </tr>

                <tr>
                    <td align="right">resultFlag：</td>
                    <td><font id="resultFlag"></font></td>
                </tr>
            </div>
        </div>
        {{--<tr>--}}
        {{--<td align="right"></td>--}}
        {{--<td><font id="errorMsg"></font></td>--}}
        {{--</tr>--}}
        <div style="display: none;">
            <tr>
                <td align="right">status：</td>
                <td><font id="status"></font></td>
            </tr>



            <tr>
                <td align="right">返回信息：</td>
                <td><font id="ret"></font></td>
            </tr>

            <tr>
                <td align="left">
                    <img name="Base64Jpg0Display" />(Jpg照片，在IE8中可以显示)
                </td>
            </tr>

            <tr>
                <td align="left">
                    <img name="Base64Jpg1Display" />(Jpg照片，在IE8中可以显示)
                </td>
            </tr>
            <tr>
                <td align="left">
                    <img name="Base64Jpg2Display" />(Jpg照片，在IE8中可以显示)
                </td>
            </tr>
            <tr>
                <td align="left">
                    <img name="Base64Jpg3Display" />(Jpg照片，在IE8中可以显示)
                </td>
            </tr>
            </table>
        </div>

    </section>
    </section>
    <!-- END SECTION -->




@stop