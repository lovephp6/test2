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

            document.all['Name'].value = pName;
            document.all['Sex'].value = pSex;
            document.all['Nation'].value = pNation+'族';
            document.all['Born'].value = pBorn;
            document.all['Address'].value = pAddress;
            document.all['CardNo'].value = pCardNo;
            document.all['Police'].value = pPolice;
            document.all['ActivityLFrom'].value = pActivityLFrom;
            document.all['ActivityLTo'].value = pActivityLTo;
            /* 加的 */

            document.all['qixian'].value = pf+' -- '+pto;
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
            document.all['Name'].value = '';
            document.all['Sex'].value = '';
            document.all['Nation'].value = '';
            document.all['Born'].value = '';
            document.all['Address'].value = '';
            document.all['CardNo'].value = '';
            document.all['Police'].value = '';
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
               <span class="label btn-info" style="width:100px;height:35px;line-height:40px;">
                    　　学籍管理　　
                    </span>　
                    <span class="label btn-info" style="width:100px;height:35px;">
                    　　注册学籍　　
                    </span>
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
                                    <a data-toggle="tab" href="#xsxk">　注册学籍　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#xszs">　教务信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#pxzs">　招生信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#jyzs">　就业信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#scfj">　上传附件　</a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="xsxk" class="tab-pane active">
                                    <div class="panel-body">
                                        <object type="application/cert-reader"  id="plugin" width=0 height=0> </object>
                                        <form id="default" class="form-horizontal" action="" method="post">
                                            {{--<fieldset title="基本信息" class="step" id="default-step-0" style="display: block;">--}}
                                            {{--<legend></legend>--}}

                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tbody>
                                                {{ csrf_field() }}
                                                <tr class="text-center">
                                                    <td colspan="7" style="font-weight: bold;">身份信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="Name" value="{{ $studentsMsg->Name }}"></td>
                                                    <td class="bgw">性　　别</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="Sex" value="{{ $studentsMsg->Sex }}"></td>
                                                    <td class="bgw">民　　族</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="Nation" value="{{ $studentsMsg->Nation }}"></td>
                                                    <td class="bgw" rowspan="4">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <input type="hidden" name="photo" id="filename" value="">
                                                            <div class="fileupload-new thumbnail">
                                                                <!-- <img src="" alt="" id="photoes">-->
                                                                <img src="{{ asset($studentsMsg->photo) }}" alt="" id="photoes" style="width:120px;height:150px;">
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
                                                        <input name="Born" class="form-control in_bgw" type="text" value="{{ date('Y-m-d',$studentsMsg->Born) }}">
                                                    </td>
                                                    <td class="bgw">身份证号</td>
                                                    <td class="bgw" colspan="3">
                                                        <input class="form-control in_bgw" type="text" name="CardNo" value="{{ $studentsMsg->CardNo }}">
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户籍地址</td>
                                                    <td class="bgw" colspan="5"><input name="Address" type="text" class="form-control in_bgw" value="{{ $studentsMsg->Address }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">证件期限</td>
                                                    <td class="bgw" colspan="5"><input name="qixian" type="text" class="form-control in_bgw" value="{{ $studentsMsg->qixian }}"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">基本信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw" style="width: 14%;">学生编号</td>
                                                    <td><input name="student_num" type="text" class="form-control in_bgw" value="{{ $studentsMsg->student_num }}"></td>
                                                    <td class="bgw" style="width: 14%;">学　　历</td>
                                                    <td><input name="edu" type="text" class="form-control in_bgw" value="{{ $studentsMsg->edu }}"></td>
                                                    <td class="bgw" style="width: 14%;">政治面貌</td>
                                                    <td><input name="political_status" type="text" class="form-control in_bgw" value="{{ $studentsMsg->political_status }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">手机号码</td>
                                                    <td><input name="phone_num" type="text" class="form-control in_bgw" value="{{ $studentsMsg->phone_num }}"></td>
                                                    <td class="bgw">身　　高</td>
                                                    <td><input name="student_height" type="text" class="form-control in_bgw" value="{{ $studentsMsg->student_height }}"></td>
                                                    <td class="bgw">体　　重</td>
                                                    <td><input name="student_weight" type="text" class="form-control in_bgw" value="{{ $studentsMsg->student_weight }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">专业信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw" style="width: 14%;">专业名称</td>
                                                    <td><input name="major_name" type="text" class="form-control in_bgw" value="{{ $studentsMsg->major_name }}"></td>
                                                    <td class="bgw" style="width: 14%;">专业类型</td>
                                                    <td><input name="major_type" type="text" class="form-control in_bgw" value="{{ $studentsMsg->major_type }}"></td>
                                                    <td class="bgw" style="width: 14%;">学　　制</td>
                                                    <td><input name="major_date" type="text" class="form-control in_bgw" value="{{ $studentsMsg->major_date }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">班　　级</td>
                                                    <td><input name="student_class" type="text" class="form-control in_bgw" value="{{ $studentsMsg->student_class }}"></td>
                                                    <td class="bgw">班 主 任</td>
                                                    <td><input name="teacher" type="text" class="form-control in_bgw" value="{{ $studentsMsg->teacher }}"></td>
                                                    <td class="bgw">入学时间</td>
                                                    <td><input name="come_time" type="text" class="form-control in_bgw" value="{{ date('Y-m-d',$studentsMsg->come_time) }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="3" style="font-weight: bold;">教育信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">毕业院校</td>
                                                    <td class="bgw">所学专业</td>
                                                    <td class="bgw">学　　历</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="graduation_school[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->graduation_school[0] }}"></td>
                                                    <td><input name="major_study[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->major_study[0] }}"></td>
                                                    <td><input name="education[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->education[0] }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="graduation_school[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->graduation_school[1] }}"></td>
                                                    <td><input name="major_study[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->major_study[1] }}"></td>
                                                    <td><input name="education[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->major_study[1] }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="4" style="font-weight: bold;">家长信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw">关　　系</td>
                                                    <td class="bgw">工作单位</td>
                                                    <td class="bgw">联系电话</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="parents_name[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_name[0] }}"></td>
                                                    <td><input name="parents_relationship[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_relationship[0] }}"></td>
                                                    <td><input name="parents_company[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_company[0] }}"></td>
                                                    <td><input name="parents_phone[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_phone[0] }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="parents_name[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_name[1] }}"></td>
                                                    <td><input name="parents_relationship[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_relationship[1] }}"></td>
                                                    <td><input name="parents_company[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_company[1] }}"></td>
                                                    <td><input name="parents_phone[]" type="text" class="form-control in_bgw" value="{{ $studentsMsg->parents_phone[1] }}"></td>
                                                </tr>
                                            </table><br>
                                            {{--<center>--}}
                                            {{--<button class="btn btn-info" id="tijiao" style="width:200px;">提交</button>--}}
                                            {{--</center>--}}
                                        </form>
                                    </div>
                                </div>
                                <div id="xszs" class="tab-pane"><div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-1 col-sm-1 control-label" style="text-align: right">证书编号2</label>
                                                <div class="col-lg-5">
                                                    <input type="email" class="form-control" id="inputEmail1" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-1 col-lg-5">
                                                    <button type="submit" class="btn btn-danger">　　保　存　　 </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div></div>
                                <div id="pxzs" class="tab-pane"><div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-1 col-sm-1 control-label" style="text-align: right">证书编号3</label>
                                                <div class="col-lg-5">
                                                    <input type="email" class="form-control" id="inputEmail1" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-1 col-lg-5">
                                                    <button type="submit" class="btn btn-danger">　　保　存　　 </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div></div>
                                <div id="jyzs" class="tab-pane"><div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-1 col-sm-1 control-label" style="text-align: right">证书编号4</label>
                                                <div class="col-lg-5">
                                                    <input type="email" class="form-control" id="inputEmail1" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-1 col-lg-5">
                                                    <button type="submit" class="btn btn-danger">　　保　存　　 </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div></div>
                                <div id="scfj" class="tab-pane"><div class="panel-body">

                                    </div></div>
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