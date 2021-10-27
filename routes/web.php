<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationCntroller;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegisterController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $adminData = User::find(Auth::user()->id);
    return view('admin.index', compact('adminData'));
})->name('dashboard');


Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


//+------------------------ User Management all Route  --------------------------------------+//

Route::prefix('user')->group(function () {

    Route::get('/view', [UserController::class, 'ViewUser'])->name('view.user');
    Route::get('/add', [UserController::class, 'AddUser'])->name('add.user');
    Route::post('/store', [UserController::class, 'StoreUser'])->name('store.user');
    Route::post('/update/{id}', [UserController::class, 'UpdateUser'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'DeleteUser'])->name('user.delete');
});


//+---------------------- Profile routes and password --------------------\\

Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class, 'ViewProfile'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'EditProfile'])->name('profile.edit');
    Route::post('/update', [ProfileController::class, 'UpdateProfile'])->name('profile.update');
    Route::get('/changePassword', [ProfileController::class, 'ChangePassword'])->name('profile.change.password');
    Route::post('/Update/password', [ProfileController::class, 'UpdatePassword'])->name('profile.update.password');
});


//+---------------------- Setu Class All routes ----------------------------+|
Route::prefix('Setup')->group(function () {
    // Student Class Routes
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudentClass'])->name('stuent.class.view');
    Route::post('student/class/store', [StudentClassController::class, 'StoreStudentClass'])->name('student.class.store');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'DeleteStudentClass'])->name('student.class.delete');

    //Student Year Routes
    Route::get('student/year/view', [StudentYearController::class, 'ViewStudentYear'])->name('stuent.year.view');
    Route::post('student/year/store', [StudentYearController::class, 'StoreStudentYear'])->name('student.year.store');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('student.year.update');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'DeleteStudentYear'])->name('student.year.delete');

    //Student Group Routes
    Route::get('student/group/view', [StudentGroupController::class, 'ViewStudentGroup'])->name('stuent.group.view');
    Route::post('student/group/store', [StudentGroupController::class, 'StoreStudentGroup'])->name('student.group.store');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('student.group.update');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'DeleteStudentGroup'])->name('student.group.delete');

    //Student Group Routes
    Route::get('student/shift/view', [StudentShiftController::class, 'ViewStudentShift'])->name('stuent.shift.view');
    Route::post('student/shift/store', [StudentShiftController::class, 'StoreStudentShift'])->name('student.shift.store');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'DeleteStudentShift'])->name('student.shift.delete');

    //Fee Category Routes
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
    Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('fee.category.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('category.ajouter');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFeeCategory'])->name('fee.category.update');
    Route::get('fee/category/supprimer/{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('fee.supprimer');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('fee.category.delete');

    //Fee Amount Category Routes
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
    Route::post('fee/category/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('fee.amount.store');
    Route::get('fee/category/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('fee/category/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('fee.amount.update');
    Route::get('fee/category/details/{id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');
    Route::get('fee/category/delete/{id}', [FeeAmountController::class, 'DeleteFeeAmount'])->name('fee.amount.delete');

    //Exam Types Routes
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::post('exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('exam.type.store');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');

    //School Subject Routes
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('school.subject.store');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('school.subject.update');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'DeleteSchoolSubject'])->name('school.subject.delete');

    //Assign Subject Routes
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/Add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{id}', [AssignSubjectController::class, 'EditteAssignSubject'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('assign.subject.update');
    Route::get('assign/subject/details/{id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');

    //Designation Routes
    Route::get('designation/view', [DesignationCntroller::class, 'ViewDesignation'])->name('designation.view');
    Route::post('designation/store', [DesignationCntroller::class, 'StoreDesignation'])->name('designation.store');
    Route::post('designation/update/{id}', [DesignationCntroller::class, 'UpdateDesignation'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationCntroller::class, 'DeleteDesignation'])->name('designation.delete');
});

//+-------------------- Student Management Al Routes -----------------------+|
Route::prefix('Student')->group(function () {

    //\\_____________________________Student Registration routes_____________//\\
    Route::get('register/view', [StudentRegisterController::class, 'SudentRegisterView'])->name('stuent.registration.view');
    Route::post('registration', [StudentRegisterController::class, 'StudentRegistrationStore'])->name('sotre.student.registration');
    Route::get('year/class/wise', [StudentRegisterController::class, 'StudentYearClassWise'])->name('student.year.class.wise');
    Route::get('registration/edit/{id}', [StudentRegisterController::class, 'StudentRegistrEdit'])->name('student.registration.edit');
    Route::post('registration/update/{student_id}', [StudentRegisterController::class, 'StudentRegistrUpdate'])->name('student.registration.update');
    Route::get('registration/promotion/{student_id}', [StudentRegisterController::class, 'StudentRegistrProm'])->name('student.registration.promotion');
    Route::post('regstation/student/promotion/{student_id}', [StudentRegisterController::class, 'StudentRegistrPromotion'])->name('promotion.student.registration');
    Route::get('regstation/student/details/{student_id}', [StudentRegisterController::class, 'StudentRegistrDetails'])->name('student.registration.details');


    //\\_____________________________Roll Generate routes_____________//\\
    Route::get('role/generate/view', [StudentRollController::class, 'RollGenerateView'])->name('role.generate.view');
    Route::get('role/generate/getStud/view', [StudentRollController::class, 'RollGenerateGetStude'])->name('student.registration.getStudent');
    Route::post('role/generate/store', [StudentRollController::class, 'RollGenerateStore'])->name('roll.generate.store');

    //\\_____________________________Regestation fee  routes_____________//\\
    Route::get('registration/fee/view', [RegistrationFeeController::class, 'RegsitrationFeeView'])->name('registation.fee.view');
    Route::get('registration/fee/classwiseData', [RegistrationFeeController::class, 'RegFeeClassFata'])->name('student.registration.fee.classewise.get');
    Route::get('registration/fee/paysleep', [RegistrationFeeController::class, 'RegFeePaySlip'])->name('student.registration.fee.paysleep');

    //\\_____________________________Monthly fee  routes_____________//\\
    Route::get('Monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('Monthly/fee/classwiseData', [MonthlyFeeController::class, 'MonthlyFeeClasswise'])->name('student.monthly.fee.classewise.get');
    Route::get('Monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePaySlip'])->name('student.monthly.fee.paysleep');

    //\\_____________________________Monthly fee  routes_____________//\\
    Route::get('exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
    Route::get('exam/fee/classwiseData', [ExamFeeController::class, 'ExamFeeClasswise'])->name('student.exam.fee.classewise.get');
    Route::get('exam/fee/payslip', [ExamFeeController::class, 'ExamFeePaySlip'])->name('student.exam.fee.paysleep');
});
