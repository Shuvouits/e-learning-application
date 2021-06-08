<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LanguageTranslationController;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


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











//Admin Route

Route::get('/admin-login', function () {
    return view('admin.admin_login');
});

Route::group(['middleware' => ['AdminCustomAuth']], function(){
    Route::get('/admin_dashboard/{locale}', [AdminController::class, 'admin_dashboard_language']);
    Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('/admin_user', [AdminController::class, 'admin_user']);

    Route::get('/admin_course', [AdminController::class, 'admin_course']);
    Route::get('/admin_add_course', [AdminController::class, 'admin_add_course_show']);
    Route::post('/admin_ajax_course_slug', [AdminController::class, 'admin_ajax_course_slug']);
    Route::post('/admin_ajax_course_category',[AdminController::class, 'admin_ajax_course_category']);
    Route::post('/admin_ajax_course_subcategory',[AdminController::class, 'admin_ajax_course_subcategory']);
    Route::post('/admin_add_course', [AdminController::class, 'admin_add_course']);
    Route::get('/admin_course/edit/{id}', [AdminController::class, 'admin_course_edit_show']);
    Route::post('/admin_edit_course', [AdminController::class, 'admin_edit_course']);
    Route::get('/admin_course_status/{id}', [AdminController::class, 'admin_course_status']);
    Route::get('/admin_course_feature/{id}', [AdminController::class, 'admin_course_feature']);
    Route::get('/admin_course_bundle/{id}', [AdminController::class, 'admin_course_bundle']);
    Route::get('/admin_course_zoom/{id}', [AdminController::class, 'admin_course_zoom']);
    Route::get('/admin_course/delete/{id}', [AdminController::class, 'admin_course_delete']);
    Route::get('/admin_course_recent/{id}', [AdminController::class, 'admin_course_recent']);
    Route::get('/admin_add_course_content', [AdminController::class, 'admin_add_course_content_show']);
    Route::post('/admin_add_course_content', [AdminController::class, 'admin_add_course_content']);   

    Route::get('/admin_category', [AdminController::class, 'admin_category']);
    Route::post('/admin_add_category', [AdminController::class, 'admin_add_category']);
    Route::get('/admin_add_category_show', [AdminController::class, 'admin_add_category_show']);
    Route::get('/admin_delete_category/{id}', [AdminController::class, 'admin_delete_category']);
    Route::get('/admin_category_edit/{id}', [AdminController::class, 'admin_category_edit_show']);
    Route::get('/admin_category/status/{id}', [AdminController::class, 'admin_category_status']);
    Route::get('/admin_category/featured/{id}', [AdminController::class, 'admin_category_featured']);
    Route::post('/admin_edit_category', [AdminController::class, 'admin_edit_category']);
    Route::get('/admin_category_recent/{id}', [AdminController::class, 'admin_category_recent']);
    
    
    Route::get('/admin_sub_category', [AdminController::class, 'admin_sub_category']);
    Route::get('/admin_add_sub_category', [AdminController::class, 'admin_add_sub_category_show']);
    Route::post('/admin_add_subCategory', [AdminController::class, 'admin_add_subCategory']);
    Route::get('/admin_subcategory/delete/{id}', [AdminController::class, 'admin_subcategory_delete']);
    Route::get('/admin_sub_category/edit/{id}', [AdminController::class, 'admin_sub_category_edit_show']);
    Route::post('/admin_edit_subcategory', [AdminController::class, 'admin_edit_subcategory']);
    Route::get('/admin/subcategory/status/{id}', [AdminController::class, 'admin_subcategory_status']);


    Route::get('/admin_child_category', [AdminController::class, 'admin_child_category']);
    Route::get('/admin_add_child_category', [AdminController::class, 'admin_add_child_category_show']);
    Route::post('/admin_ajax_category',[AdminController::class, 'admin_ajax_category']);
    Route::post('/admin_add_child_category', [AdminController::class, 'admin_add_child_category']);
    Route::get('/admin/childcategory/status/{id}', [AdminController::class, 'admin_child_category_status']);
    Route::get('/admin_childcategory/delete/{id}', [AdminController::class, 'admin_childcategory_delete']);
    Route::get('/admin_child_category/edit/{id}', [AdminController::class, 'admin_childcategory_edit_show']);
    Route::post('/admin_ajax_child_category_edit', [AdminController::class, 'admin_ajax_child_category_edit']);
    Route::post('/admin_edit_childcategory', [AdminController::class, 'admin_edit_childcategory']);



    Route::get('/admin_instructor', [AdminController::class, 'admin_instructor']);
    Route::get('/admin_order', [AdminController::class, 'admin_order']);
    Route::get('/admin_refund_order', [AdminController::class, 'admin_refund_order']);
    Route::get('/admin_multiple_instructor', [AdminController::class, 'admin_multiple_instructor']);
    Route::get('/admin_payment_setting', [AdminController::class, 'admin_payment_setting']);
    Route::get('/admin_pending_payout', [AdminController::class, 'admin_pending_payout']);
    Route::get('/admin_completed_payout', [AdminController::class, 'admin_completed_payout']);
    Route::get('/admin_logout', [AdminController::class, 'logout']);
    Route::get('/admin_profile', [AdminController::class, 'admin_profile']);
    Route::post('/admin_basic_information', [AdminController::class, 'admin_basic_information']);
    Route::post('/admin_profile_password_change', [AdminController::class, 'admin_profile_password_change']);
    Route::post('/admin_setting', [AdminController::class, 'admin_setting']);
    Route::get('/admin_instructor_view/{id}', [AdminController::class, 'admin_instructor_view']);
    Route::get('/admin_instructor_status/{id}', [AdminController::class, 'admin_instructor_status']);

    Route::get('/zoom_setting', [AdminController::class, 'zoom_setting']);
    Route::get('/zoom_meeting', [AdminController::class, 'zoom_meeting']);
    Route::get('/zoom_meeting_delete/{id}', [AdminController::class, 'zoom_meeting_delete']);
    Route::post('/zoom_meeting_post_data', [AdminController::class, 'zoom_meeting_post_data']);
    Route::get('/create_zoom_meeting', [AdminController::class, 'create_zoom_meeting']);
    

    //frontend

    Route::get('/admin_home', [AdminController::class, 'admin_home']);
    Route::post('/admin_home_recent_course', [AdminController::class, 'admin_home_recent_course']);

});


Route::get('/admin/forgot_password', [AdminController::class, 'admin_forgot_password']);
Route::post('/admin_forgot_password_post', [AdminController::class, 'admin_forgot_password_post']);
Route::post('/admin_post', [AdminController::class, 'admin_post']);


Route::get('/admin/user', [AdminController::class, 'user']);
Route::get('/admin/zoom-setting', [AdminController::class, 'zoom_setting']);
Route::get('/admin/all-meeting', [AdminController::class, 'all_meeting']);

Route::get('/admin/view_course/{id}', [AdminController::class, 'admin_view_course']);





//Start Student Route

//Route Facebook
Route::get('/student_facebook', [SystemController::class, 'student_facebook']);

//Route Google
Route::get('/student_google', [SystemController::class, 'student_google']);

//middleware route

Route::group(['middleware'=> ['StudentCustomAuth']], function(){
    Route::get('/student_dashboard', [StudentController::class, 'student_dashboard']);
    Route::get('/student_bank_details', [StudentController::class, 'bank_details']);
    Route::get('/student_add_bank', [StudentController::class, 'add_bank']);
    Route::get('/student_instructor', [StudentController::class, 'student_instructor']);
});




Route::get('/', [StudentController::class, 'index']);
Route::post('/student_registration_post', [StudentController::class, 'student_registration_post']);
Route::get('/student_login', [StudentController::class, 'student_login']);
Route::post('/student_login_post', [StudentController::class, 'student_login_post']);

Route::get('/student_logout', [StudentController::class, 'student_logout']);
Route::get('/student_forgot_password', [StudentController::class, 'student_forgot_password']);
Route::post('/student_forgot_password_post', [StudentController::class, 'student_forgot_password_post']);



//Teacher Route

Route::get('/teacher_register', [TeacherController::class, 'teacher_register']);
Route::get('/teacher_login', [TeacherController::class, 'teacher_login']);
Route::post('/teacher_registration_post', [TeacherController::class, 'teacher_registration_post']);
Route::post('/teacher_login_post', [TeacherController::class, 'teacher_login_post']);
Route::get('/teacher_forgot_password', [TeacherController::class, 'teacher_forgot_password']);
Route::post('/teacher_forgot_password_post', [TeacherController::class, 'teacher_forgot_password_post']);


//Route Facebook
Route::get('/fbsub', [SystemController::class, 'fbsub']);
Route::get('/fbres', [SystemController::class, 'fbres']);

//Route Google
Route::get('/googlesub', [SystemController::class, 'googlesub']);
Route::get('/googleres', [SystemController::class, 'googleres']);





Route::group(['middleware' => ['CustomAuth']], function () {
    Route::get('/teacher_dashboard', [TeacherController::class, 'teacher_dashboard']);

    Route::get('/teacher_category', [TeacherController::class, 'teacher_category']);
    Route::post('/teacher_add_category', [TeacherController::class, 'teacher_add_category']);
    Route::get('/teacher_category/edit/{id}', [TeacherController::class, 'teacher_edit_category_show']);
    Route::post('/teacher_edit_category', [TeacherController::class, 'teacher_edit_category']);
    Route::get('/teacher_category/delete/{id}', [TeacherController::class, 'teacher_category_delete']);
    Route::get('/category/status/{id}',[TeacherController::class, 'teacher_Category_status']);
    

    Route::get('/teacher_sub_category', [TeacherController::class, 'teacher_sub_category']);
    Route::post('/teacher_add_subCategory', [TeacherController::class, 'teacher_add_subCategory']);
    Route::post('/teacher_edit_subcategory', [TeacherController::class, 'teacher_edit_subcategory']);
    Route::get('/teacher_subcategory/delete/{id}', [TeacherController::class, 'teacher_subcategory_delete']);
    Route::get('/subcategory/status/{id}',[TeacherController::class, 'teacher_subCategory_status']);
    Route::get('/teacher_sub_category/edit/{id}', [TeacherController::class, 'teacher_sub_category_edit_show']);

    Route::get('/teacher_child_category', [TeacherController::class, 'teacher_child_category']);
    Route::post('/teacher_ajax_category',[TeacherController::class, 'teacher_ajax_category']);
    Route::post('/teacher_add_child_category', [TeacherController::class, 'teacher_add_child_category']);
    Route::get('/childcategory/status/{id}',[TeacherController::class, 'teacher_childCategory_status']);
    Route::post('/teacher_edit_childcategory', [TeacherController::class, 'teacher_edit_childcategory']);
    Route::get('/teacher_childcategory/delete/{id}', [TeacherController::class, 'teacher_childcategory_delete']);
    Route::get('/teacher_child_category/edit/{id}', [TeacherController::class, 'teacher_child_category_edit_show']);
    Route::post('/teacher_ajax_child_category_edit', [TeacherController::class, 'teacher_ajax_child_category_edit']);


    Route::get('/teacher_course', [TeacherController::class, 'teacher_course']);
    Route::post('/teacher_add_course', [TeacherController::class, 'teacher_add_course']);
    Route::post('/teacher_ajax_course_category',[TeacherController::class, 'teacher_ajax_course_category']);
    Route::post('/teacher_ajax_course_subcategory',[TeacherController::class, 'teacher_ajax_course_subcategory']);
    Route::post('/teacher_edit_course', [TeacherController::class, 'teacher_edit_course']);
    Route::get('/teacher_course/delete/{id}', [TeacherController::class, 'teacher_course_delete']);
    Route::post('/teacher_ajax_course_category_edit',[TeacherController::class, 'teacher_ajax_course_category_edit']);
    Route::post('/teacher_ajax_course_subcategory_edit',[TeacherController::class, 'teacher_ajax_course_subcategory_edit']);
    Route::get('/teacher_course/edit/{id}', [TeacherController::class, 'teacher_course_edit_show']);
    Route::post('/teacher_ajax_course_slug', [TeacherController::class, 'teacher_ajax_course_slug']);
  

    Route::get('/teacher_course_language', [TeacherController::class, 'teacher_course_language']);
    Route::post('/teacher_add_language', [TeacherController::class, 'teacher_add_language']);
    Route::get('/teacher_language_status/{id}', [TeacherController::class, 'teacher_language_status']);
    Route::post('/teacher_course_language_edit', [TeacherController::class, 'teacher_course_language_edit']);
    Route::get('/teacher_course_language_delete/{id}', [TeacherController::class, 'teacher_course_language_delete']);


    Route::get('/teacher_request_involve', [TeacherController::class, 'teacher_request_involve']);
    Route::get('/teacher_involvement_request', [TeacherController::class, 'teacher_involvement_request']);
    Route::get('/teacher_involve_course', [TeacherController::class, 'teacher_involve_course']);
    Route::get('/teacher_user_enrolled', [TeacherController::class, 'teacher_user_enrolled']);
    Route::get('/teacher_question_answer', [TeacherController::class, 'teacher_question_answer']);

    Route::get('/teacher_answer', [TeacherController::class, 'teacher_answer']);
    Route::get('/teacher_answer_status/{id}', [TeacherController::class, 'teacher_answer_status']);
    Route::post('/add_teacher_question', [TeacherController::class, 'add_teacher_question']);
    Route::get('/teacher_question_answer/status/{id}', [TeacherController::class, 'teacher_question_answer_status']);
    Route::get('/teacher_question_answer/edit/{id}', [TeacherController::class, 'teacher_question_answer_edit_show']);
    Route::post('/teacher_question_asnwer_edit', [TeacherController::class, 'teacher_question_asnwer_edit']);
    Route::get('/teacher_question_answer/delete/{id}', [TeacherController::class, 'teacher_question_answer_delete']);


    Route::get('/teacher_announcement', [TeacherController::class, 'teacher_announcement']);
    Route::post('/teacher_annoucement_add', [TeacherController::class, 'teacher_annoucement_add']);
    Route::get('/teacher_annoucement_status/{id}', [TeacherController::class, 'teacher_annoucement_status']);
    Route::get('/teacher_announcement/edit/{id}', [TeacherController::class, 'teacher_announcement_edit']);
    Route::post('/announcement_edit',[TeacherController::class, 'announcement_edit']);
    Route::get('/teacher_announcement/delete/{id}', [TeacherController::class, 'teacher_announcement_delete']);


    Route::get('/teacher_blog', [TeacherController::class, 'teacher_blog']);
    Route::post('/teacher_blog_add', [TeacherController::class, 'teacher_blog_add']);
    Route::get('/teacher_blog/edit/{id}', [TeacherController::class, 'teacher_blog_edit']);
    Route::post('/teacher_blog_edit_post', [TeacherController::class, 'teacher_blog_edit_post']);
    Route::get('/teacher_blog/delete/{id}', [TeacherController::class, 'teacher_blog_delete']);


    Route::get('/teacher_featured_course', [TeacherController::class, 'teacher_featured_course']);
    Route::post('/teacher_featured_course_add', [TeacherController::class, 'teacher_featured_course_add']);
    Route::get('/teacher_featured_course/delete/{id}', [TeacherController::class, 'teacher_featured_course_delete']);
    Route::get('/teacher_featured_course/view/{id}', [TeacherController::class, 'teacher_featured_course_view']);


    Route::get('/teacher_pending_payout', [TeacherController::class, 'teacher_pending_payout']);
    Route::get('/teacher_completed_payout', [TeacherController::class, 'teacher_completed_payout']);
    Route::get('/teacher_payment_setting', [TeacherController::class, 'teacher_payment_setting']);
    Route::post('/ajax_payment_setting', [TeacherController::class, 'ajax_payment_setting']);

    Route::get('/teacher_logout', [TeacherController::class, 'teacher_logout']);


    //Language Route
    Route::get('/teacher_dashboard/{locale}', [TeacherController::class, 'teacher_dashboard_language']);


   
});

//End Teacher Route





//parent route

Route::get('/parent_register', [ParentController::class, 'parent_register']);
Route::get('/parent_login', [ParentController::class, 'parent_login']);
Route::post('/parent_registration_post', [ParentController::class, 'parent_registration_post']);
Route::post('/parent_login_post', [ParentController::class, 'parent_login_post']);
Route::get('/parent_dashboard', [ParentController::class, 'parent_dashboard']);
Route::get('/parent_logout', [ParentController::class, 'parent_logout']);
Route::get('/parent_forgot_password', [ParentController::class, 'parent_forgot_password']);
Route::post('/parent_forgot_password_post', [ParentController::class, 'parent_forgot_password_post']);
