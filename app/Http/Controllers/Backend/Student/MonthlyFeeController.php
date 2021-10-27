<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class MonthlyFeeController extends Controller
{
    public function MonthlyFeeView()
    {
        $data['years']   = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('student_management.monthly_fee.view', $data);
    }

    public function MonthlyFeeClasswise(Request $request)
    {
        
        if ($request->class_id != '') {
            $where[] = ['class_id', 'like', $request->class_id . '%'];
        }
        if ($request->year_id != '') {
            $where[] = ['year_id', 'like', $request->year_id . '%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Role</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v) {
            $Registration_fee = FeeAmount::where('fee_category_id', '2')->where('class_id', $v->class_id)->first();
            $color = "success";
            $discount = ($key + 1) * 3;
            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->roll . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $Registration_fee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $discount . '%' . '</td>';
            $originalFee = $Registration_fee->amount;
            $discounttablefee = $discount / 100 * $originalFee;
            $finalfee = (float)$originalFee - (float)$discounttablefee;

            $html[$key]['tdsource'] .= '<td>' . $finalfee . '$' . ' </td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '"
                title="PaySlip" target="_blanks" href="' . route("student.monthly.fee.paysleep") .
                '?class_id=' . $v->class_id . '&student_id=' . $v->student_id .'&month=' . $request->month . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }

        return response()->json(@$html);
    }

    public function MonthlyFeePaySlip(Request $request)
    {
        $data['month']  = $request->month;
        $data['details'] = AssignStudent::with(['student', 'discount'])
            ->where('student_id', $request->student_id)
            ->where('class_id', $request->class_id)->first();
        
        $pdf = Pdf::loadView('student_management.monthly_fee.details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
