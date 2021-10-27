<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        $data['allData'] = FeeAmount::select(['fee_category_id'])->groupBy('fee_category_id')->get();
        return view('backend.fee_amount.view_fee_amount', $data);
    }

    public function AddFeeAmount()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes']        = StudentClass::all();
        return view('backend.fee_amount.add_fee_amount', $data);
    }
    public function StoreFeeAmount(Request $request)
    {
        $count = count($request->class_id);
        if ($count != NULL) {
            for ($i = 0; $i < $count; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->created_at = Carbon::now();
                $fee_amount->save();
            }
            $notification = array('message' => 'Fee amount inserted successfully', 'alert-type' => 'success');
            return redirect()->route('fee.amount.view')->with($notification);
        } else {
            $notification = array('message' => 'You cant insert amount with empty fields', 'alert-type' => 'error');
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function EditFeeAmount($fee_category_id)
    {
        $data['editData'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes']        = StudentClass::all();
        return view('backend.fee_amount.update_fee_amount', $data);
    }

    public function UpdateFeeAmount(Request $request, $fee_category_id)
    {
        if ($request->class_id != NULL) {
            $count = count($request->class_id);
            FeeAmount::wher('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $count; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->updated_at = Carbon::now();
                $fee_amount->save();
            }
            $notification = array('message' => 'Fee amount Updated successfully', 'alert-type' => 'success');
            return redirect()->route('fee.amount.view')->with($notification);
        } else {
            $notification = array(
                'message' => 'You don not select any class amount',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.category.edit', $fee_category_id)->with($notification);
        }
    }

    public function DetailsFeeAmount($fee_category_id)
    {
        $data['detailsData'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.fee_amount.details_fee_amount',$data);
    }

    public function DeleteFeeAmount($id)
    {
        FeeAmount::find($id)->delete();
        $notification = array('message' => 'Fee Category deleted successfully', 'alert-type' => 'success');
        return redirect()->route('fee.category.view')->with($notification);
    }
}
