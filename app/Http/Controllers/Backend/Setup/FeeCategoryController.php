<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.fee_category.fee_category_view', $data);
    }

    public function StoreFeeCategory(Request $request)
    {
        if (FeeCategory::where('name', $request->name)->exists()) {
            $notification1 = array('message' => 'Fee Category already exist', 'alert-type' => 'error');
            return redirect()->route('fee.category.view')->with($notification1);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:fee_categories']);
            FeeCategory::insert(['name' => $request->name, 'created_at' => Carbon::now()]);
            $notification = array('message' => 'Fee Category inserted successfully', 'alert-type' => 'success');
            return redirect()->route('fee.category.view')->with($notification);
        }
    }

    public function UpdateFeeCategory(Request $request, $id)
    {       
        if (FeeCategory::where('name', $request->name)->exists()) {
            $notification = array('message' => 'Fee Category already exist', 'alert-type' => 'error');
            return redirect()->route('fee.category.view')->with($notification);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_years']);
            FeeCategory::find($id)->update(['name' => $request->name, 'updated_at' => Carbon::now()]);
            $notification = array('message' => 'Fee Category updated successfully', 'alert-type' => 'success');
            return redirect()->route('fee.category.view')->with($notification);
        }
    }

    public function DeleteFeeCategory($id)
    {
        FeeCategory::find($id)->delete();
        $notification = array('message' => 'Fee Category deleted successfully', 'alert-type' => 'success');
        return redirect()->route('fee.category.view')->with($notification);
    }
}
