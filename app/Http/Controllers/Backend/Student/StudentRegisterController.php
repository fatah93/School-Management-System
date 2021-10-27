<?php

namespace App\Http\Controllers\Backend\Student;

use Carbon\Carbon;
use App\Models\User;
use App\Models\StudentYear;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class StudentRegisterController extends Controller
{
    public function SudentRegisterView()
    {
        $data['groupes'] = StudentGroup::all();
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['Shifts'] = StudentShift::all();
        $data['year_id'] = StudentYear::orderBy('id', 'asc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'asc')->first()->id;
        $data['AllData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('student_management.student_registration.view', $data);
    }

    public function StudentRegistrationStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $chekYear = StudentYear::find($request->year_id);
            $student  = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();
            if ($student == NULL) {
                $firstReg = 0;
                $studentID = $firstReg + 1;
                if ($studentID < 10) {
                    $id_no = '000' . $studentID;
                } elseif ($studentID < 100) {
                    $id_no = '00' . $studentID;
                } elseif ($studentID < 1000) {
                    $id_no = '0' . $studentID;
                }
            } else {
                $student  = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentID = $student + 1;

                if ($studentID < 10) {
                    $id_no = '000' . $studentID;
                } elseif ($studentID < 100) {
                    $id_no = '00' . $studentID;
                } elseif ($studentID < 1000) {
                    $id_no = '0' . $studentID;
                }
            }
            $final_id_no = "ST" . ($chekYear->name % 100) . $id_no;
            $user = new User();
            $code = Str::random(8);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = "Student";
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->Mname;
            $user->mobile = $request->mobile;
            $user->adress = $request->adress;
            $user->gender = $request->gender;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->religion = $request->religion;
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_image'), $fileName);
                $user->image = $fileName;
            }
            $user->save();


            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $user->id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->created_at = Carbon::now();
            $assignStudent->save();


            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id =  $assignStudent->id;
            $discountStudent->fee_category_id   = "1";
            $discountStudent->discount = $request->discount;
            $discountStudent->created_at = Carbon::now();
            $discountStudent->save();
        });

        $notification = array(
            'message'    => 'SUCCESS : Student registred successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('stuent.registration.view')->with($notification);
    }

    public function StudentYearClassWise(Request $request)
    {
        $data['Shifts'] = StudentShift::all();
        $data['groupes'] = StudentGroup::all();
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['year_id'] = $request->id;
        $data['class_id'] = $request->id;
        $data['AllData'] = AssignStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return view('student_management.student_registration.view', $data);
    }

    public function StudentRegistrEdit($id)
    {
        $data['groupes'] = StudentGroup::all();
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['Shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::with(['discount', 'student'])->where('student_id', $id)->first();
        return view('student_management.student_registration.edit', $data);
    }

    public function StudentRegistrUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {

            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->Mname;
            $user->mobile = $request->mobile;
            $user->adress = $request->adress;
            $user->gender = $request->gender;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->religion = $request->religion;
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_image' . $request->image));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_image'), $fileName);
                $user->image = $fileName;
            }
            $user->updated_at = Carbon::now();
            $user->save();

            $assignStudent = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->updated_at = Carbon::now();
            $assignStudent->save();

            $discountStudent = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discountStudent->discount = $request->discount;
            $discountStudent->updated_at = Carbon::now();
            $discountStudent->save();
        });

        $notification = array(
            'message'    => 'SUCCESS : Student Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('stuent.registration.view')->with($notification);
    }

    public function StudentRegistrProm($student_id)
    {
        $data['groupes'] = StudentGroup::all();
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['Shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::with(['discount', 'student'])->where('student_id', $student_id)->first();
        return view('student_management.student_registration.promotion', $data);
    }

    public function StudentRegistrPromotion(Request $request, $student_id)
    {

        DB::transaction(function () use ($request, $student_id) {
            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $student_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->created_at = Carbon::now();
            $assignStudent->save();

            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = "1";
            $discountStudent->discount = $request->discount;
            $discountStudent->created_at = Carbon::now();
            $discountStudent->save();
        });

        $notification = array(
            'message'    => 'SUCCESS : Student Promotion Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('stuent.registration.view')->with($notification);
    }

    public function StudentRegistrDetails($student_id)
    {
        $data['details'] = AssignStudent::with(['discount', 'student'])->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('student_management.student_registration.details_pdf',$data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('student_details.pdf');
    }

    public function RollGenerateView(){
        
    }
    
}

