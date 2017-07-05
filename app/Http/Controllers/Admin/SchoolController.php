<?php

namespace App\Http\Controllers\Admin;

use App\Model\Certificate;
use App\Model\Enclosure;
use App\Model\Student;
use App\Model\Student_edu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SchoolController extends Controller
{
    public function index()
    {
        $studentsMsgs = Student::all();
        return view('admin/school/index', ['studentsMsgs' => $studentsMsgs]);
    }

    // 查看详情
    public function show($id)
    {
        $studentsMsg = Student::find($id);
        $studentsMsg['graduation_school'] = json_decode($studentsMsg['graduation_school']);
        $studentsMsg['major_study'] = json_decode($studentsMsg['major_study']);
        $studentsMsg['education'] = json_decode($studentsMsg['education']);
        $studentsMsg['parents_name'] = json_decode($studentsMsg['parents_name']);
        $studentsMsg['parents_relationship'] = json_decode($studentsMsg['parents_relationship']);
        $studentsMsg['parents_company'] = json_decode($studentsMsg['parents_company']);
        $studentsMsg['parents_phone'] = json_decode($studentsMsg['parents_phone']);
        return view('admin/school/show', ['studentsMsg' => $studentsMsg]);
    }

    // 修改方法
    public function edit(Request $request,$id)
    {
        $studentsMsg = Student::find($id);
        $studentsMsg['graduation_school'] = json_decode($studentsMsg['graduation_school']);
        $studentsMsg['major_study'] = json_decode($studentsMsg['major_study']);
        $studentsMsg['education'] = json_decode($studentsMsg['education']);
        $studentsMsg['parents_name'] = json_decode($studentsMsg['parents_name']);
        $studentsMsg['parents_relationship'] = json_decode($studentsMsg['parents_relationship']);
        $studentsMsg['parents_company'] = json_decode($studentsMsg['parents_company']);
        $studentsMsg['parents_phone'] = json_decode($studentsMsg['parents_phone']);
        if ($request->isMethod('post')) {
            $studentsMsgs = $request->except('_token');
            $studentsMsgs['come_time'] = strtotime($studentsMsgs['come_time']);
            $studentsMsgs['Born'] = strtotime($studentsMsgs['Born']);
            $studentsMsgs['graduation_school'] = json_encode($studentsMsgs['graduation_school']);
            $studentsMsgs['major_study'] = json_encode($studentsMsgs['major_study']);
            $studentsMsgs['education'] = json_encode($studentsMsgs['education']);
            $studentsMsgs['parents_name'] = json_encode($studentsMsgs['parents_name']);
            $studentsMsgs['parents_relationship'] = json_encode($studentsMsgs['parents_relationship']);
            $studentsMsgs['parents_company'] = json_encode($studentsMsgs['parents_company']);
            $studentsMsgs['parents_phone'] = json_encode($studentsMsgs['parents_phone']);

            // 处理base64图片
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $studentsMsgs['photo'], $result)) {
                $ext = $result[2];
                $filename = "./upload/photos/" . md5(date('YmdHsi', time()) . rand(10000, 99999)) . ".{$ext}";
                if (file_put_contents($filename, base64_decode(str_replace($result[1], '', $studentsMsgs['photo'])))) {
                    $studentsMsgs['photo'] = $filename;
                } else {
                    die('照片出错');
                }
            }

            $res = Student::where('id', $id)->update($studentsMsgs);
            if($res){
                return redirect()->back()->with('success','修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/school/edit', ['studentsMsg' => $studentsMsg]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $studentsMsgs = $request->except('_token');
            $studentsMsgs['come_time'] = strtotime($studentsMsgs['come_time']);
            $studentsMsgs['Born'] = strtotime($studentsMsgs['Born']);

            // 处理base64图片
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $studentsMsgs['photo'], $result)) {
                $ext = $result[2];
                $filename = "./upload/photos/" . md5(date('YmdHsi', time()) . rand(10000, 99999)) . ".{$ext}";
                if (file_put_contents($filename, base64_decode(str_replace($result[1], '', $studentsMsgs['photo'])))) {
                    $studentsMsgs['photo'] = $filename;
                } else {
                    die('照片出错');
                }
            }
            $studentsMsgs['graduation_school'] = json_encode($studentsMsgs['graduation_school']);
            $studentsMsgs['major_study'] = json_encode($studentsMsgs['major_study']);
            $studentsMsgs['education'] = json_encode($studentsMsgs['education']);
            $studentsMsgs['parents_name'] = json_encode($studentsMsgs['parents_name']);
            $studentsMsgs['parents_relationship'] = json_encode($studentsMsgs['parents_relationship']);
            $studentsMsgs['parents_company'] = json_encode($studentsMsgs['parents_company']);
            $studentsMsgs['parents_phone'] = json_encode($studentsMsgs['parents_phone']);
            if (Student::create($studentsMsgs)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
        return view('admin/school/add');
    }

    // 上传附件
    public function students_img(Request $request)
    {
        if ($request->isMethod('post')) {
            $student_num = $request->input('student_num');
            $res = Student::where('student_num', $student_num)->first();
            if ($res) {
                $student_name = Student::where('student_num', $student_num)->first()['Name'];
                $file = Input::file('file');
                // 扩展名
                $ext = $file->getClientOriginalExtension();
                // 新文件名
                $filename = date('YmdHis') . uniqid() . '.' . $ext;
                // 将文件写入指定路径
                $path = $file->move(base_path() . '/public/upload/img/', $filename);
                $paths = '/public/upload/img/'. $filename;
                $pathname['img_something'] = $paths;
                $pathname['student_num'] = $student_num;
                $pathname['student_name'] = $student_name;
                if(Enclosure::create($pathname)) {
                    return redirect()->back()->with('success', '添加成功');
                } else {
                    return redirect()->back()->with('error', '添加失败');
                }
            } else {
                return redirect()->back()->with('error', '此学生不存在');
            }
        }

        return view('admin/school/students_img');
    }
    
    // 删除方法
    public function delete(Request $request)
    {
       $id = $request->input('id');
       $res = Student::where('id', $id)->delete();
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

    //证书管理
    public function certificate()
    {
        $studentsMsgs = \DB::table('students')->join('certificate','students.CardNo','=','certificate.CardNo')->get();
        return view('admin/school/certificate',['studentsMsgs' => $studentsMsgs]);
    }
    //注册证书
    public function management(Request $request)
    {
        if($request->isMethod('post')){
            $cardno = $request->input('CardNo');
            $studentMsg = Student::where('CardNo', $cardno)->first();
            return view('admin/school/management',['studentMsg' => $studentMsg]);
        }
        return view('admin/school/management');
    }
    
    // 添加证书
    public function add_management(Request $request)
    {
        if ($request->isMethod('post')) {
            $res = $request->except('_token');
            $res['issue_date'] = strtotime($res['issue_date']);
            if (Certificate::create($res)) {
                return redirect()->back()->with('success', '添加成功');
            } else {
                return redirect()->back()->with('error', '添加失败');
            }
        }
    }
    
    // 修改证书
    public function certificate_edit(Request $request,$id)
    {
        $result = Certificate::find($id);
        $studentMsg = Student::where('CardNo', $result->CardNo)->first();
        $sid = $studentMsg['id'];
        $studentMsg['certificate_number'] = $result['certificate_number'];
        $studentMsg['degree_education'] = $result['degree_education'];
        $studentMsg['professional_level'] = $result['professional_level'];
        $studentMsg['evaluation_audit'] = $result['evaluation_audit'];
        $studentMsg['issue_date'] = $result['issue_date'];
        if ($request->isMethod('post')) {
            $res = $request->except('_token');
            $stuMsg['student_num'] = $res['student_num'];
            $stuMsg['Name'] = $res['Name'];
            $stuMsg['Sex'] = $res['Sex'];
            $stuMsg['CardNo'] = $res['CardNo'];
            $stuMsg['Born'] = strtotime($res['Born']);
            $stuMsg['school_name'] = $res['school_name'];
            $stuMsg['major_name'] = $res['major_name'];
            $stuMsg['major_type'] = $res['major_type'];
            $stuMsg['major_date'] = $res['major_date'];
            $stuMsg['come_time'] = strtotime($res['come_time']);
            $cerificate['certificate_number'] = $res['certificate_number'];
            $cerificate['degree_education'] = $res['degree_education'];
            $cerificate['professional_level'] = $res['professional_level'];
            $cerificate['evaluation_audit'] = $res['evaluation_audit'];
            $cerificate['issue_date'] = strtotime($res['issue_date']);
            $s_update = Student::where('id', $sid)->update($stuMsg);
            $c_update = Certificate::where('id', $id)->update($cerificate);
            if ($s_update && $c_update) {
                return redirect()->back()->with('success', '修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/school/certificate_edit',['studentMsg' => $studentMsg]);
    }

    // 删除证书
    public function certificate_delete(Request $request)
    {
        $cid = $request->input('id');
//        $card = Certificate::find($cid)->CardNo;
//        $s_delete = Student::where('CardNo', $card)->delete();
        $c_delete = Certificate::where('id', $cid)->delete();
        $data = [];
        if ($c_delete) {
            $data['state'] = 200;
            $data['message'] = '删除成功';
            return data;
        } else {
            $data['state'] = 0;
            $data['message'] = '删除失败';
            return data;
        }
    }

    //学生卡
    public function students_card(Request $request)
    {
        if($request->isMethod('post')){
            $cardno = $request->input('CardNo');
            $studentMsg = Student::where('CardNo', $cardno)->first();
            return view('admin/school/students_card',['studentMsg' => $studentMsg]);
        }
        return view('admin/school/students_card');
    }

    //学生证
    public function students_zheng(Request $request)
    {
        if($request->isMethod('post')){
            $cardno = $request->input('CardNo');
            $studentMsg = Student::where('CardNo', $cardno)->first();
            return view('admin/school/students_zheng',['studentMsg' => $studentMsg]);
        }
        return view('admin/school/students_zheng');
    }
    
    // 学历管理
    public function education(Request $request)
    {
        $student_edus = Student_edu::all();
        if ($request->isMethod('post')) {
            $msg = $request->except('_token');
            $receive_people = isset($msg['receive_people']) ? $msg['receive_people'] : '';
            $cardno = isset($msg['CardNo']) ? $msg['CardNo'] : '';
            $begin = isset($msg['date_begin']) ? strtotime($msg['date_begin']) : '';
            $stop = isset($msg['date_stop']) ? strtotime($msg['date_stop']) : '';
//            $res = Student_edu::whereBetween('register_date', array($begin, $stop))->orWhere('receive_people', $receive_people)->orWhere('CardNo', $cardno)->get();
            $handle = \DB::table('students_edu');
            $where = '1=1 ';
            if($receive_people) {
                $where.= " and receive_people = '{$receive_people}' ";
            } elseif($cardno) {
                $where.= " and CardNo = '{$cardno}' ";
            } elseif ($begin && $stop) {
                $where.= " and register_date >= '{$begin}' and register_date <= '{$stop}' ";
            }
            $student_edus = $handle->whereRaw($where)->get();

        }
        return view('admin/school/education', ['student_edus' => $student_edus]);
    }
    // 添加学历
    public function add_education(Request $request)
    {
        if($request->isMethod('post')) {
            $student_edu = $request->except('_token');
            // 处理base64图片
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $student_edu['photo'], $result)) {
                $ext = $result[2];
                $filename = "./upload/photos/" . md5(date('YmdHsi', time()) . rand(10000, 99999)) . ".{$ext}";
                if (file_put_contents($filename, base64_decode(str_replace($result[1], '', $student_edu['photo'])))) {
                    $student_edu['photo'] = $filename;
                } else {
                    die('照片出错');
                }
            }
            $student_edu['examination_date'] = strtotime($student_edu['examination_date']);
            $student_edu['register_date'] = strtotime($student_edu['register_date']);
            $student_edu['receive_date'] = strtotime($student_edu['receive_date']);
            $student_edu['Born'] = strtotime($student_edu['Born']);
            if (Student_edu::create($student_edu)) {
                return redirect()->back()->with('success', '注册成功');
            } else {
                return redirect()->back()->with('error', '注册失败');
            }
        }
        return view('admin/school/add_education');
    }

    // 显示学历
    public function edu_show($id)
    {
        $student_edu = Student_edu::find($id);
        return view('admin/school/edu_show', ['student_edu' => $student_edu]);
    }
    // 编辑学历
    public function edu_edit(Request $request,$id)
    {
        $student_edu = Student_edu::find($id);
        if ($request->isMethod('post')) {
            $stu_edu = $request->except('_token');
            // 处理base64图片
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $stu_edu['photo'], $result)) {
                $ext = $result[2];
                $filename = "./upload/photos/" . md5(date('YmdHsi', time()) . rand(10000, 99999)) . ".{$ext}";
                if (file_put_contents($filename, base64_decode(str_replace($result[1], '', $stu_edu['photo'])))) {
                    $stu_edu['photo'] = $filename;
                } else {
                    die('照片出错');
                }
            }
            $stu_edu['examination_date'] = strtotime($stu_edu['examination_date']);
            $stu_edu['register_date'] = strtotime($stu_edu['register_date']);
            $stu_edu['receive_date'] = strtotime($stu_edu['receive_date']);
            $stu_edu['Born'] = strtotime($stu_edu['Born']);
            $res= Student_edu::where('id', $id)->update($stu_edu);
            if ($res) {
                return redirect()->back()->with('success', '修改成功');
            } else {
                return redirect()->back()->with('error', '修改失败');
            }
        }
        return view('admin/school/edu_edit', ['student_edu' => $student_edu]);
    }

    // 删除方法
    public function edu_delete(Request $request)
    {
        $id = $request->input('id');
        $res = Student_edu::where('id',$id)->delete();
        if ($res) {
            return redirect()->back()->with('success', '删除成功');
        } else {
            return redirect()->back()->with('error', '删除失败');
        }
    }
}
