<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Icon;
use Illuminate\Support\Facades\Session;
use App;
use Illuminate\Support\Str;
use App\Models\Teachercategory;
use App\Models\Teachersubcategory;
use App\Models\Teacherchildcategory;
use App\Models\Teachercourse;
use App\Models\Zoom;
use App\Models\Content;

class AdminController extends Controller
{
    //

    public function admin_dashboard()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin|Dashboard';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = 'active';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = '';
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.admin_dashboard',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }
        
    }

    public function admin_dashboard_language($locale)
    {

        

        App::setLocale($locale);
        session()->put('locale_language', $locale);

       

        
        if($locale=='English')
        {
            $title = "Admin|Dashboard|English";
        }

        if($locale=='Bangla')
        {
            $title = "Admin|Dashboard|Bangla";
        }
        
      

        $session_admin_email = session()->get('session_admin_email');
    
        

         //menu 
         $dashboard = 'active';
         $category='';
         $category_open='';
         $sub_category='';
         $child_category='';
         $course_open='';
         $course = '';
         $course_language='';
         $multiple_instructor='';
         $request_involve='';
         $involvement_request='';
         $involve_course = '';
         $user_enrolled = '';
         $question = '';
         $question_menu='';
         $answer = '';
         $announcement='';
         $blog='';
         $featured_course='';
         $pending_payout='';
         $my_revenue='';
         $completed_payout='';
         $payment_setting='';
         $user = '';
         $instructor = '';
         $order = '';
         $refund_order = '';
         $instructor_payout = '';
         $language = $locale;
         

         $admin_data = Admin::where('email',$session_admin_email)->get();
         return view('admin.admin_dashboard',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
    }

    public function admin_post(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $check_valid = Admin::where('email', $email)->where('password', $password)->count();
        if($check_valid==1)
        {
            session()->put('session_admin_email', $email);
            return redirect('/admin_dashboard')->with('success', 'Welcome to admin');
        }else{
            return redirect('/admin-login')->with('error', 'Error email or password');
        }
        

    }

    public function admin_user()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | User';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 

             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = 'active';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = '';
             $create_zoom_meeting = '';
            
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.user',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_course()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Course';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = 'active';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = '' ;
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_course = Teachercourse::all();
             $all_teacher = Teacher::all();
             return view('admin.course',['admin_data'=>$admin_data, 'all_teacher'=>$all_teacher, 'all_course'=>$all_course], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    

    public function admin_add_course_show()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Add | Course';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = 'active';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_course = Teachercourse::all();
             $all_category_data = Teachercategory::all();
             return view('admin.add_course',['admin_data'=>$admin_data, 'all_category_data'=>$all_category_data, 'all_course'=>$all_course], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }

    }

    public function admin_ajax_course_slug(Request $request)
    {
        $title = $request->input('title');
        $slug = Str::of($title)->slug('-');
        $output = $slug;
        echo json_encode($output);
    }

    public function admin_ajax_course_category(Request $request)
    {
        $id = $request->input('id');
        $get_sub_cat = Teachersubcategory::where('category_id', $id)->get();
        $cap = array('get_sub_cat' => $get_sub_cat);
        $output = '<option selected="selected" disabled="disabled">Select subcategory</option>';

        foreach ($get_sub_cat as $key) {
            $output .= '<option value=" ' . $key->id . ' ">' . $key->sub_category_name . '</option>';
        }

       
        echo json_encode($output);
    }

    public function admin_ajax_course_subcategory(Request $request)
    {
        $id = $request->input('id');
        $get_child_cat = Teacherchildcategory::where('subcategory_id', $id)->get();
        $cap = array('get_child_cat' => $get_child_cat);
        $output = '<option selected="selected" disabled="disabled">Select subcategory</option>';

        foreach ($get_child_cat as $key) {
            $output .= '<option value=" ' . $key->id . ' ">' . $key->title . '</option>';
        }

       
        echo json_encode($output);
    }

    public function admin_add_course(Request $request)
    {
        $category_id = $request->input('category');
        $subcategory_id = $request->input('sub_category');
        $childcategory_id = $request->input('child_category');
        $refund_policy = $request->input('refund_policy');
        $language = $request->input('language');
        $course_tag = $request->input('course_tag');
        $details = $request->input('details');
    
        $short_details = $request->input('short_details');
        $requirements = $request->input('requirements');
        $payment_option = $request->input('payment_option');
        $course_duration = $request->input('course_duration');
        $assignment_option = $request->input('assignment_option');
        $course_content = $request->input('course_content');
        $certificate = $request->input('certificate');
        $price = $request->input('price');
        $video_url = $request->input('video_url');
        $title = $request->input('course_title');
        $teacher_email = $request->input('teacher_email');

        $slug = Str::of($title)->slug('-');

        $link = $video_url;
        $video_id = explode("?v=", $link);
        $video_id = $video_id[1];
        $intro_learn = $request->input('intro_learn');
        
        

        $target_category = Teachercategory::where('id',$category_id)->get();

        foreach($target_category as $item)
        {
            $category_name = $item->name;
        }

        $target_subcategory = Teachersubcategory::where('id',$subcategory_id)->get();

        foreach($target_subcategory as $item)
        {
            $subcategory_name = $item->sub_category_name;
        }

        $target_childcategory = Teacherchildcategory::where('id',$childcategory_id)->get();

        foreach($target_childcategory as $item)
        {
            $childcategory_name = $item->title;
        }
        

        $msg = "";
         $image = $_FILES['image']['name'];
         $target = "images/" . basename($image);
 
         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
             $msg = "Image uploaded successfully";
         } else {
             $msg = "Failed to upload image";
         }

         $msg = "";
         $video = $_FILES['upload_video']['name'];
         $target = "images/" . basename($image);
 
         if (move_uploaded_file($_FILES['upload_video']['tmp_name'], $target)) {
             $msg = "Image uploaded successfully";
         } else {
             $msg = "Failed to upload image";
         }

         $teacher_course = New Teachercourse();
         $teacher_course->teacher_email = $teacher_email;
         $teacher_course->category_id = $category_id;
         $teacher_course->category_name = $category_name;
         $teacher_course->subcategory_id = $subcategory_id;
         $teacher_course->subcategory_name = $subcategory_name;
         $teacher_course->childcategory_id = $childcategory_id;
         $teacher_course->childcategory_name = $childcategory_name;
         $teacher_course->language = $language;
         $teacher_course->refund_policy = $refund_policy;
         $teacher_course->course_tag = $course_tag;
         $teacher_course->title = $title;
         $teacher_course->slug = $slug;
         $teacher_course->short_details = $short_details;
         $teacher_course->requirements = $requirements;
         $teacher_course->intro_learn = $intro_learn;
         $teacher_course->details = $details;
         $teacher_course->pay_option = $payment_option;
         $teacher_course->course_duration = $course_duration;
         $teacher_course->course_price = $price;
         $teacher_course->upload_video = $video;
         $teacher_course->full_link = $video_url;
         $teacher_course->url = $video_id;
         $teacher_course->image = $image;
         $teacher_course->assignment_option = $assignment_option;
         $teacher_course->course_content = $course_content;
         $teacher_course->certificate_option = $certificate;
         $teacher_course->save();

        return redirect('/admin_course')->with('add_course', 'New Course Added Successfully');
    }

    public function admin_course_edit_show($id)
    {
        $course_edit_data = Teachercourse::where('id',$id)->get();
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Edit | Course';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

            //menu
            
            $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = 'active';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
 
            

            $admin_data = Admin::where('email',$session_admin_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $all_teacher_course = Teachercourse::all();
            $icon = Icon::all();

            return view('admin.edit_course',['admin_data'=>$admin_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'all_teacher_course'=>$all_teacher_course, 'course_edit_data'=>$course_edit_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
        }else{
            return redirect('/admin-login');
        }

    }

    public function admin_edit_course(Request $request)
    {
        $course_id = $request->input('course_id');


        $category_id = $request->input('category');
        $subcategory_id = $request->input('sub_category');
        $childcategory_id = $request->input('child_category');
        $refund_policy = $request->input('refund_policy');
        $language = $request->input('language');
        $course_tag = $request->input('course_tag');
        $details = $request->input('details');
    
        $short_details = $request->input('short_details');
        $requirements = $request->input('requirements');
        $intro_learn = $request->input('intro_learn');
        $payment_option = $request->input('payment_option');
        $course_duration = $request->input('course_duration');
        $assignment_option = $request->input('assignment_option');
        $course_content = $request->input('course_content');
        $certificate = $request->input('certificate');
        $price = $request->input('price');
        $video_url = $request->input('video_url');
        $title = $request->input('course_title');

        $link = $video_url;
        $video_id = explode("?v=", $link);
        $video_id = $video_id[1];
       

        $slug = Str::of($title)->slug('-');
        $target_category = Teachercategory::where('id',$category_id)->get();

        foreach($target_category as $item)
        {
            $category_name = $item->name;
            
        }

        

        $target_subcategory = Teachersubcategory::where('id',$subcategory_id)->get();

        foreach($target_subcategory as $item)
        {
            $subcategory_name = $item->sub_category_name;
        }

        $target_childcategory = Teacherchildcategory::where('id',$childcategory_id)->get();

        foreach($target_childcategory as $item)
        {
            $childcategory_name = $item->title;
        }

        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $msg = "";
        $video = $_FILES['upload_video']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['upload_video']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        
        $teacher_course = Teachercourse::find($course_id);

        if($image=='')
        {
            $teacher_course->category_id = $category_id;
         $teacher_course->category_name = $category_name;
         $teacher_course->subcategory_id = $subcategory_id;
         $teacher_course->subcategory_name = $subcategory_name;
         $teacher_course->childcategory_id = $childcategory_id;
         $teacher_course->childcategory_name = $childcategory_name;
         $teacher_course->language = $language;
         $teacher_course->refund_policy = $refund_policy;
         $teacher_course->course_tag = $course_tag;
         $teacher_course->details = $details;
         $teacher_course->title = $title;
         $teacher_course->slug = $slug;
         $teacher_course->short_details = $short_details;
         $teacher_course->requirements = $requirements;
         $teacher_course->intro_learn = $intro_learn;
         
         $teacher_course->pay_option = $payment_option;
         $teacher_course->course_duration = $course_duration;
         $teacher_course->course_price = $price;
         $teacher_course->upload_video = $video;
         $teacher_course->url = $video_id;
         $teacher_course->full_link = $video_url;
         //$teacher_course->image = $image;
         $teacher_course->assignment_option = $assignment_option;
         $teacher_course->course_content = $course_content;
         $teacher_course->certificate_option = $certificate;
         $teacher_course->save();

        }else{

            $teacher_course->category_id = $category_id;
         $teacher_course->category_name = $category_name;
         $teacher_course->subcategory_id = $subcategory_id;
         $teacher_course->subcategory_name = $subcategory_name;
         $teacher_course->childcategory_id = $childcategory_id;
         $teacher_course->childcategory_name = $childcategory_name;
         $teacher_course->language = $language;
         $teacher_course->refund_policy = $refund_policy;
         $teacher_course->course_tag = $course_tag;
         $teacher_course->details = $details;
         $teacher_course->title = $title;
         $teacher_course->slug = $slug;
         $teacher_course->short_details = $short_details;
         $teacher_course->requirements = $requirements;
         $teacher_course->intro_learn = $intro_learn;
         
         $teacher_course->pay_option = $payment_option;
         $teacher_course->course_duration = $course_duration;
         $teacher_course->course_price = $price;
         $teacher_course->upload_video = $video;
         $teacher_course->url = $video_id;
         $teacher_course->full_link = $video_url;
         $teacher_course->image = $image;
         $teacher_course->assignment_option = $assignment_option;
         $teacher_course->course_content = $course_content;
         $teacher_course->certificate_option = $certificate;
         $teacher_course->save();
        }

         

        return redirect('/admin_course')->with('edit_course','One Course Updated Successfully');
    }

    public function admin_add_course_content_show()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Course | Content';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = 'active';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = '' ;
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_course = Teachercourse::all();
             $all_teacher = Teacher::all();
             return view('admin.add_course_content',['admin_data'=>$admin_data, 'all_teacher'=>$all_teacher, 'all_course'=>$all_course], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }
    }

    public function admin_add_course_content(Request $request)
    {
        
        $course_id = $request->input('course_id');
        $video_title = $request->input('title');
        $content_data = New Content();
        
        if($request->file('file')){
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('images/'.$filename);
            $content_data->video = $filename;
        }

        $content_data->course_id = $course_id;
        $content_data->video_title = $video_title;
        $content_data->save();
        return redirect('/admin_add_course_content');

        
    }

    public function admin_course_recent($id)
    {
        $admin_course_recent = Teachercourse::find($id);
        
        if($admin_course_recent->recent_course=='Yes')
        {
            $admin_course_recent->recent_course = 'No';
            $admin_course_recent->save();
        }else{
            $admin_course_recent->recent_course = 'Yes';
            $admin_course_recent->save();

        }
        return redirect('/admin_course')->with('recent', 'Recent Course Update Successfully');
    }

    public function admin_course_status($id)
    {
        $admin_course_status = Teachercourse::find($id);
        if($admin_course_status->status=='Active')
        {
            $admin_course_status->status = 'Deactive';
            $admin_course_status->save();
        }else{
            $admin_course_status->status = 'Active';
            $admin_course_status->save();

        }
        return redirect('/admin_course')->with('status', 'Course Status Update Successfully');

    }

    public function admin_course_feature($id)
    {
        $admin_course_feature = Teachercourse::find($id);
        if($admin_course_feature->featured=='Yes')
        {
            $admin_course_feature->featured="No";
            $admin_course_feature->save();
        }else{
            $admin_course_feature->featured="Yes";
            $admin_course_feature->save();

        }
        return redirect('/admin_course')->with('featured', 'Course Featured Updated Successfully');
    }

    public function admin_course_bundle($id)
    {
        $admin_course_bundle = Teachercourse::find($id);
        if($admin_course_bundle->bundle=='Yes')
        {
            $admin_course_bundle->bundle="No";
            $admin_course_bundle->save();
        }else{
            $admin_course_bundle->bundle="Yes";
            $admin_course_bundle->save();

        }
        return redirect('/admin_course')->with('bundle', 'Course Bundle Updated Successfully');

    }

    public function admin_course_zoom($id)
    {

        $admin_course_zoom = Teachercourse::find($id);
        if($admin_course_zoom->zoom=='Yes')
        {
            $admin_course_zoom->zoom="No";
            $admin_course_zoom->save();
        }else{
            $admin_course_zoom->zoom="Yes";
            $admin_course_zoom->save();

        }
        return redirect('/admin_course')->with('zoom', 'Zoom Featured Update Successfully');

    }

    public function admin_course_delete($id)
    {
        $target_id = Teachercourse::find($id);
        $target_id->delete();
        return redirect('/admin_course')->with('delete_course', 'One Course Item Deleted Successfully');
    }

    public function admin_category_recent($id)
    {
        $admin_category_recent = Teachercategory::find($id);
        if($admin_category_recent->recent=='Yes')
        {
            $admin_category_recent->recent="No";
            $admin_category_recent->save();
        }else{
            $admin_category_recent->recent="Yes";
            $admin_category_recent->save();

        }
        return redirect('/admin_category')->with('recent', 'Course Recent Updated Successfully');

    }

    public function admin_category()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='active';
             $category_open='menu-open';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = '';
             $create_zoom_meeting = '';
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_category = Teachercategory::all();
             return view('admin.category',['admin_data'=>$admin_data, 'all_category'=>$all_category], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_add_category_show()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='active';
             $category_open='menu-open';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $icon = Icon::all();
             return view('admin.add_category',['admin_data'=>$admin_data, 'icon'=>$icon], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_add_category(Request $request)
    {
        $category_name = $request->input('name');
        $slug = Str::of($category_name)->slug('-');
        $featured = $request->input('featured');
        $status = $request->input('status');
        $icon = $request->input('icon');

        $image = $request->input('image');
        
         //upload Image

         $msg = "";
         $image = $_FILES['image']['name'];
         $target = "images/" . basename($image);
 
         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
             $msg = "Image uploaded successfully";
         } else {
             $msg = "Failed to upload image";
         }
         

         $teacher_category = new Teachercategory;

         $teacher_category->name = $category_name;
         $teacher_category->status = $status;
         $teacher_category->featured = $featured;
         $teacher_category->image = $image;
         $teacher_category->slug = $slug;
         $teacher_category->icon = $icon;
         $teacher_category->save();

         return redirect('/admin_category')->with('add_category', 'Category Added Successfully');

    }

   

    public function admin_category_edit_show($id)
    {

        $edit_category_all_data = Teachercategory::where('id',$id)->get();
        

        
        
        //edit data end
        $session_admin_email = session()->get('session_admin_email');

        $locale_language = session()->get('locale_language');

        App::setLocale($locale_language);

        if($locale_language=='')
        {
            App::setLocale('English');
            $language = 'English';
        }else{
            App::setLocale($locale_language);
            $language = $locale_language;

        }
        
        
            $title = 'Admin | Edit | Category';

            //menu 
            $dashboard = '';
            $category='active';
            $category_open='menu-open';
            $sub_category='';
            $child_category='';
            $course_open='';
            $course = '';
            $course_language='';
            $multiple_instructor='';
            $request_involve='';
            $involvement_request='';
            $involve_course = '';
            $user_enrolled = '';
            $question = '';
            $question_menu='';
            $answer = '';
            $announcement='';
            $blog='';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';
            $user = '';
            $instructor = '';
            $order = '';
            $refund_order = '';
            $instructor_payout = '';


            



            $admin_data = Admin::where('email',$session_admin_email)->get();

            $all_category_data = Teachercategory::all();
            $icon = Icon::all();

           

            return view('admin.edit_category',['admin_data'=>$admin_data, 'all_category_data'=>$all_category_data, 'icon'=>$icon, 'edit_category_all_data'=>$edit_category_all_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
        

    }

    public function admin_category_status($id)
    {
        $category_status = Teachercategory::find($id);

        //return $category_status;

        if($category_status->status=='Active')
        {
            $category_status->status='Deactive';
            $category_status->save();
        }else{
            $category_status->status='Active';
            $category_status->save();
        }
        return redirect('/admin_category')->with('status','Update Status Successfully');
    }

    public function admin_delete_category($id)
    {
        
        $target_category_data = Teachercategory::find($id);
        $target_category_data->delete();

        $target_subcategory_data = Teachersubcategory::where('category_id', $id)->delete();
        
        $target_childcategory_data = Teacherchildcategory::where('category_id', $id)->delete();
        

        return redirect('/admin_category')->with('delete_category', 'Category Deleted Successfully');
    }

    public function admin_category_featured($id)
    {
        $featured_data = Teachercategory::find($id);
        if($featured_data->featured=='Yes')
        {
            $featured_data->featured="No";
            $featured_data->save();
        }else{
            $featured_data->featured = "Yes";
            $featured_data->save();
        }
        return redirect('/admin_category')->with('featured', 'Featured Update Successfully');
    }


    public function admin_edit_category(Request $request)
    {
        $category_name = $request->input('name');
    
        $featured = $request->input('featured');
        $status = $request->input('status');

        $image = $request->input('image');
        $id = $request->input('id');
        $icon = $request->input('icon');
        
         //upload Image

         $msg = "";
         $image = $_FILES['image']['name'];
         $target = "images/" . basename($image);
 
         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
             $msg = "Image uploaded successfully";
         } else {
             $msg = "Failed to upload image";
         }
         

         $teacher_category = Teachercategory::find($id);

         $teacher_category->name = $category_name;
         $teacher_category->status = $status;
         $teacher_category->featured = $featured;
         $teacher_category->image = $image;
         $teacher_category->icon = $icon;
         $teacher_category->save();

         return redirect('/admin_category')->with('edit_category', 'Category Edited Successfully');

    }


    public function admin_child_category()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Child | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='menu-open';
             $sub_category='';
             $child_category='active';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $child_category_data = Teacherchildcategory::all();
             return view('admin.child_category',['admin_data'=>$admin_data, 'child_category_data'=>$child_category_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_add_child_category_show()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Child | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='menu-open';
             $sub_category='';
             $child_category='active';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $child_category_data = Teacherchildcategory::all();
             $all_category_data = Teachercategory::all();
             $icon = Icon::all();
             return view('admin.add_child_category',['admin_data'=>$admin_data, 'icon'=>$icon, 'all_category_data'=>$all_category_data, 'child_category_data'=>$child_category_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            

        }else{
            return redirect('/admin-login');
        }

    }

    public function admin_ajax_category(Request $request)
    {
        $id = $request->input('id');
        $get_sub_cat = Teachersubcategory::where('category_id', $id)->get();
        $cap = array('get_sub_cat' => $get_sub_cat);
        $output = '<option>Select subcategory</option>';

        foreach ($get_sub_cat as $key) {
            $output .= '<option value=" ' . $key->id . ' ">' . $key->sub_category_name . '</option>';
        }

       
        echo json_encode($output);
    }

    public function admin_add_child_category(Request $request)
    {
        $title = $request->input('title');
        $category_id = $request->input('category');
        $sub_category_id = $request->input('sub_category');
        $icon = $request->input('icon');
        $status = $request->input('status');

        

        $target_category = Teachercategory::where('id',$category_id)->get();
        foreach($target_category as $item)
        {
            $category_name = $item->name;
        }

        

        

        $target_sub_category = Teachersubcategory::where('id',$sub_category_id)->get();
        foreach($target_sub_category as $item)
        {
            $sub_category_name = $item->sub_category_name;
        }

        $teacher_child_category = New Teacherchildcategory();
        $teacher_child_category->title = $title;
        $teacher_child_category->category_name = $category_name;
        $teacher_child_category->category_id = $category_id;

        $teacher_child_category->subcategory_name = $sub_category_name;
        $teacher_child_category->subcategory_id = $sub_category_id;

        $teacher_child_category->icon = $icon;
        $teacher_child_category->status = $status;
        $teacher_child_category->save();
        return redirect('/admin_child_category')->with('add_child_category', 'New Child Category Added');

    }

    public function admin_child_category_status($id)
    {
        $child_category_status = Teacherchildcategory::find($id);
        
        if($child_category_status->status=='Active')
        {
            $child_category_status->status="Deactive";
            $child_category_status->save();
        }else{
            $child_category_status->status="Active";
            $child_category_status->save();
        }
        return redirect('/admin_child_category')->with('status', 'Status Update Successfully');
    }

    public function admin_childcategory_delete($id)
    {
        $target_data = Teacherchildcategory::find($id);
        
        $target_data->delete();
        return redirect('/admin_child_category')->with('delete_child_category', 'One Item Deleted Successfully');

    }

    public function admin_childcategory_edit_show($id)
    {
        $edit_childcategory_all_data = Teacherchildcategory::where('id',$id)->get();
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Edit | Child | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 

             //menu 
             $dashboard = '';
             $category='';
             $category_open='menu-open';
             $sub_category='';
             $child_category='active';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
            


            $admin_data = Admin::where('email',$session_admin_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $child_category_data = Teacherchildcategory::all();
            $icon = Icon::all();
            return view('admin.edit_child_category',['admin_data'=>$admin_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'child_category_data'=>$child_category_data, 'edit_childcategory_all_data'=>$edit_childcategory_all_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
        }else{
            return redirect('/admin-login');
        }
    }

    public function admin_edit_childcategory(Request $request)
    {
        $category_id = $request->input('category_id');
        //return $category_id;
        
    
        $status = $request->input('status');
        $title = $request->input('title');

        $subcategory_id = $request->input('subcategory_id');
        
        $id = $request->input('id');
        $icon = $request->input('icon');

        $target_category = Teachercategory::where('id',$category_id)->get();
        foreach($target_category as $item)
        {
            $category_name = $item->name;
        }

        

        $target_subcategory = Teachersubcategory::where('id',$subcategory_id)->get();
        foreach($target_subcategory as $item)
        {
            $subcategory_name = $item->sub_category_name;
        }

        
        
        

         $teacher_childcategory = Teacherchildcategory::find($id);

         $teacher_childcategory->category_name = $category_name;
         $teacher_childcategory->category_id = $category_id;
         $teacher_childcategory->status = $status;
         $teacher_childcategory->subcategory_name = $subcategory_name;
         $teacher_childcategory->subcategory_id = $subcategory_id;
         $teacher_childcategory->title = $title;
         

         
         $teacher_childcategory->icon = $icon;
         $teacher_childcategory->save();

         return redirect('/admin_child_category')->with('edit_child_category', 'One Item Updated Successfully');

    }

    public function admin_ajax_child_category_edit(Request $request)
    {
        $id = $request->input('id');
        $get_sub_cat = Teachersubcategory::where('category_id', $id)->get();
        $cap = array('get_sub_cat' => $get_sub_cat);
        $output = '<option>Select subcategory</option>';

        foreach ($get_sub_cat as $key) {
            $output .= '<option value=" ' . $key->id . ' ">' . $key->sub_category_name . '</option>';
        }

       
        echo json_encode($output);
    }



    public function admin_sub_category()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Sub | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='menu-open';
             $sub_category='active';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = ''; 
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $sub_category_data = Teachersubcategory::all();
             return view('admin.sub_category',['admin_data'=>$admin_data , 'sub_category_data'=>$sub_category_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_add_sub_category_show()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Add | Sub Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='menu-open';
             $sub_category='active';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_category_data = Teachercategory::all();
             $icon = Icon::all();
             return view('admin.add_subcategory',['admin_data'=>$admin_data, 'icon'=>$icon, 'all_category_data'=>$all_category_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

   

    public function admin_add_subCategory(Request $request)
    {
        $category = $request->input('category');
        $sub_categories = $request->input('sub_categories');
        $slug = Str::of($sub_categories)->slug('-');
        $status = $request->input('status');
        $icon = $request->input('icon');

        $teacher_category = Teachercategory::where('name', $category)->get();
        foreach($teacher_category as $data)
        {
            $category_id = $data->id;


        }
        

        $teacher_subcategory = New Teachersubcategory;
        $teacher_subcategory->category_name = $category;
        $teacher_subcategory->category_id = $category_id;
        $teacher_subcategory->sub_category_name = $sub_categories;
        $teacher_subcategory->slug = $slug;
        $teacher_subcategory->status = $status;
        $teacher_subcategory->icon = $icon;

        $teacher_subcategory->save();

        return redirect('/admin_sub_category')->with('add_subcategory', 'New Sub Category Added Successfully' );

        
         
         
        
    }

    public function admin_subcategory_delete($id)
    {
        $target_data = Teachersubcategory::find($id);

        $delete_child_category_data = Teacherchildcategory::where('subcategory_id', $id)->delete();
        $target_data->delete();
        return redirect('/admin_sub_category')->with('delete_subcategory', 'One Item Deleted Successfully');

    }

    public function admin_sub_category_edit_show($id)
    {
        $edit_subcategory_all_data = Teachersubcategory::where('id', $id)->get();
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Sub | Category';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }


            //menu 

             //menu 
             $dashboard = '';
             $category='';
             $category_open='menu-open';
             $sub_category='active';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
           


            $admin_data = Admin::where('email',$session_admin_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $icon = Icon::all();

            return view('admin.edit_subcategory',['admin_data'=>$admin_data , 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'edit_subcategory_all_data'=>$edit_subcategory_all_data,'icon'=>$icon], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
        }else{
            return redirect('/admin-login');
        }

    }


    public function admin_edit_subcategory(Request $request)
    {
        $category_name = $request->input('category_name');
    
        $status = $request->input('status');

        $sub_categories = $request->input('sub_categories');
        $id = $request->input('id');
        $icon = $request->input('icon');

        $target_category = Teachercategory::where('name',$category_name)->get();
        foreach($target_category as $item)
        {
            $category_id = $item->id;
        }
        
        

         $teacher_subcategory = Teachersubcategory::find($id);

         $teacher_subcategory->category_name = $category_name;
         $teacher_subcategory->category_id = $category_id;
         $teacher_subcategory->status = $status;
         $teacher_subcategory->sub_category_name = $sub_categories;
         
         $teacher_subcategory->icon = $icon;
         $teacher_subcategory->save();

         return redirect('/admin_sub_category')->with('edit_subcategory','One Item Update Successfully');

    }

    public function admin_subcategory_status($id)
    {
        $admin_status = Teachersubcategory::find($id);
        if($admin_status->status=='Active')
        {
            $admin_status->status='Deactive';
            $admin_status->save();
        }else{
            $admin_status->status='Active';
            $admin_status->save();
        }
        return redirect('/admin_sub_category')->with('status','Update Status Successfully');
    }

   

    
    public function admin_instructor()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Instructor';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = 'active';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = ''; 
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $teacher = Teacher::all();
             return view('admin.instructor',['admin_data'=>$admin_data, 'teacher'=>$teacher], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_instructor_view($email)
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | View | Instructor';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = 'active';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $teacher_data = Teacher::where('email', $email)->get();
             
             return view('admin.view_instructor',['admin_data'=>$admin_data, 'teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
            

        }else{
            return redirect('/admin-login');
        }
        
    }

    public function admin_instructor_status($email)
    {
        $teacher_data = Teacher::where('email', $email)->first();
        if($teacher_data->status == 'Approved')
        {
            $teacher_data->status = "Pending";
            $teacher_data->save();
        }else{
            $teacher_data->status = "Approved";
            $teacher_data->save();
            
        }
      
        return redirect('/admin_instructor')->with('status', 'New Status Updated Successfully');
    }

    public function admin_order()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Order';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = 'active';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = ''; 
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.order',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }


    public function admin_refund_order()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Refund |Order';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = 'active';
             $instructor_payout = '';
             $zoom_live_menu = ''; 
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.refund_order',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_multiple_instructor()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Multiple | Instructor';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='active';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = ''; 
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.multiple_instructor',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_payment_setting()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Payout | Setting';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='active';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = 'menu-open';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.payment_setting',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_pending_payout()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Payout | Setting';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='active';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = 'menu-open';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.pending_payout',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

    public function admin_completed_payout()
    {


        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Payout | Setting';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='active';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = 'menu-open';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.completed_payout',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout'));
            
            

        }else{
            return redirect('/admin-login');
        }


    }

  
    
    




   

    public function logout(){
        Session::flush(); 
        return redirect('/admin-login');
    }

    public function admin_profile()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin|Profile|Dashboard';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = 'active';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = '';
             $zoom_meeting = ''; 
             $create_zoom_meeting = '';
             
 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             return view('admin.profile',['admin_data'=>$admin_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout','zoom_live_menu','zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }
    }

    public function admin_basic_information(Request $request)
    {
        $session_admin_email = session()->get('session_admin_email');
        $fname = $request->input('fname');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $address = $request->input('address');

        $admin = Admin::where('email', $session_admin_email)->get();
        foreach($admin as $item)
        {
            $id = $item->id;
        }
        $admin_data = Admin::find($id);
        
        $admin_data->name = $fname;
        $admin_data->email = $email;
        $admin_data->phone = $mobile;
        $admin_data->address = $address;
        $admin_data->save();
        return redirect('/admin_profile')->with('basic_information', 'Admin Profile Updated Successfully');
    }

    public function admin_profile_password_change(Request $request)
    {
        $session_admin_email = session()->get('session_admin_email');
        
        $current_password = $request->input('cpassword');
        $update_password = $request->input('upassword');

        $length_update_password = strlen($update_password);

        if($length_update_password > 7)
        {
            $count = Admin::where('password',$current_password)->where('email',$session_admin_email)->count();
            if($count==1)
            {
                $admin_data = Admin::where('email',$session_admin_email)->get();
                
                
                foreach($admin_data as $item)
                {
                    $id = $item->id;
                }
                
                $change_admin_pass = Admin::find($id);
                $change_admin_pass->password = $update_password;
                $change_admin_pass->save();
                return redirect('/admin_profile')->with('password', 'Password Updated Successfully');
            }else{
                return redirect('/admin_profile')->with('admin_password_not_match', 'Current Password Not Valid, Please Try Again');
            }

        }else{
            return redirect('/admin_profile')->with('admin_password_length', 'Update Password Must Be 8 Character');
        }

       

    }

    public function admin_setting(Request $request)
    {
        $session_admin_email = session()->get('session_admin_email');
         //upload Image

         $msg = "";
         $image = $_FILES['image']['name'];
         $target = "images/" . basename($image);
 
         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
             $msg = "Image uploaded successfully";
         } else {
             $msg = "Failed to upload image";
         }

         $details = $request->input('details');

         $admin_data = Admin::where('email', $session_admin_email)->get();
         foreach($admin_data as $item)
         {
             $id = $item->id;
         }
         $update_admin = Admin::find($id);

         if($image=='')
         {
           // $update_admin->image = $image;
            $update_admin->details = $details;
            $update_admin->save();

         }else{
            $update_admin->image = $image;
            $update_admin->details = $details;
            $update_admin->save();
         }
         
         return redirect('/admin_profile')->with('setting', 'Setting Updated Successfully');
    }

   

    public function forgot_password()
    {
        return view('forgot_password');
    }

   

    public function admin_forgot_password()
    {
        return view('admin_forgot');
    }

    public function admin_forgot_password_post(Request $request)
    {
        $email = $request->input('email');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        $password_length = strlen($new_password);
        if($password_length > 7)
        {
            if($new_password==$confirm_password)
            {
                $check = Admin::where('email',$email)->count();

                if($check==1)
                {
                    $admin = new Admin;
                    $admin_data = Admin::where('email', $email)->get();

                    foreach($admin_data as $item)
                    {
                        $admin_id = $item->id;
                    }
                    $admin = Admin::find($admin_id);
                    $admin->password = $new_password;
                    $admin->save();

                    return redirect('/admin');

                }else{
                    
                    return redirect('/admin/forgot_password')->with('email_error', 'Please give your correct email');
                }

            }else{
                return redirect('/admin/forgot_password')->with('confirm_password_error', "Confirm password doesn't match");
            }

        }else{
            return redirect('/admin/forgot_password')->with('length_error', 'Yor password at least 8 character');
        }
    }

    public function user()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | User';
            $admin_data = Admin::where('email',$session_admin_email)->get();
            return view('admin.user',['admin_data'=>$admin_data], compact('title'));

        }else{
            return redirect('/admin');
        }
    }

    public function zoom_setting()
    {
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Zoom_Setting';

            return view("admin/Zoom");

        }else{
            return redirect('/admin');
        }
        
    }

   

    public function zoom_meeting()
    {
       
        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | All_Zoom_Meeting';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = 'menu-open';
             $zoom_meeting = 'active';
             $create_zoom_meeting = '';

 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_zoom_data = Zoom::all();
             return view('admin.zoom_meeting',['admin_data'=>$admin_data, 'all_zoom_data'=>$all_zoom_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout', 'zoom_live_menu', 'zoom_meeting', 'create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }
        
    }

    public function create_zoom_meeting()
    {

        $session_admin_email = session()->get('session_admin_email');
        if($session_admin_email)
        {
            $title = 'Admin | Create_Zoom_Meeting';

            $locale_language = session()->get('locale_language');

            App::setLocale($locale_language);
    
            if($locale_language=='')
            {
                App::setLocale('English');
                $language = 'English';
            }else{
                App::setLocale($locale_language);
                $language = $locale_language;
    
            }

             //menu 
             $dashboard = '';
             $category='';
             $category_open='';
             $sub_category='';
             $child_category='';
             $course_open='';
             $course = '';
             $course_language='';
             $multiple_instructor='';
             $request_involve='';
             $involvement_request='';
             $involve_course = '';
             $user_enrolled = '';
             $question = '';
             $question_menu='';
             $answer = '';
             $announcement='';
             $blog='';
             $featured_course='';
             $pending_payout='';
             $my_revenue='';
             $completed_payout='';
             $payment_setting='';
             $user = '';
             $instructor = '';
             $order = '';
             $refund_order = '';
             $instructor_payout = '';
             $zoom_live_menu = 'menu-open';
             $zoom_meeting = '';
             $create_zoom_meeting = 'active';

 
             //End menu

             $admin_data = Admin::where('email',$session_admin_email)->get();
             $all_zoom_data = Zoom::all();
             $teacher_course = Teachercourse::all();
             return view('admin.create_zoom_meeting',['admin_data'=>$admin_data, 'teacher_course'=>$teacher_course, 'all_zoom_data'=>$all_zoom_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language','user','instructor','order','refund_order', 'instructor_payout', 'zoom_live_menu', 'zoom_meeting','create_zoom_meeting'));
            
            

        }else{
            return redirect('/admin-login');
        }
        

    }

    public function zoom_meeting_post_data(Request $request)
    {
        $topics = $request->input('topics');
        $password = $request->input('password');
        $meeting_email = $request->input('email');
        $course = $request->input('course');
        $meeting_duration = $request->input('meeting_duration');
        $api_key = $request->input('apikey');
        $api_secret = $request->input('apisecret');
        $api_url = $request->input('apiurl');

        session()->put('topics', $topics);
        session()->put('password', $password);
        session()->put('meeting_email', $meeting_email);
        
        session()->put('course', $course);
        session()->put('meeting_duration', $meeting_duration);
        session()->put('api_key', $api_key);
        session()->put('api_secret', $api_secret);
        session()->put('api_url', $api_url);
        return redirect('/zoom_setting');

       
       // return redirect('/zoom_meeting');
    }

    public function zoom_meeting_delete($id)
    {
        $zoom_meeting_id = Zoom::find($id);
        $zoom_meeting_id->delete();
        return redirect('/zoom_meeting')->with('delete_zoom', 'One Zoom Meeting Item Deleted Successfully');
    }

    //frontend

    public function admin_home()
    {
        $all_category = Teachercategory::all();
        $all_sub_category = Teachersubcategory::all();
        $all_child_category = Teacherchildcategory::all();
        $recent_category = Teachercategory::where('recent','Yes')->get();
        $all_course = Teachercourse::all();
        $all_teacher = Teacher::all();
        return view('admin.frontend.home',['all_category'=>$all_category, 'teacher'=>$all_teacher, 'all_course'=>$all_course, 'recent_category'=>$recent_category, 'all_sub_category'=>$all_sub_category, 'all_child_category'=>$all_child_category]);
    }

    public function admin_view_course($id)
    {
        $all_category = Teachercategory::all();
        $all_sub_category = Teachersubcategory::all();
        $all_child_category = Teacherchildcategory::all();
        $all_course = Teachercourse::all();

        $target_course_data = Teachercourse::find($id);
        $course_image = $target_course_data->image;
        $current_course_id = $target_course_data->id;
        $course_category_id = $target_course_data->category_id;
        $course_url = $target_course_data->url;
        $course_short_details = $target_course_data->short_details;
        $course_title = $target_course_data->title;
        $course_requirements = $target_course_data->requirements;
        $course_description = $target_course_data->details;
        $course_intro_learn = $target_course_data->intro_learn;
        $course_teacher_email = $target_course_data->teacher_email;
        
        $collect_teacher_email = Teacher::where('email', $course_teacher_email)->get();
        $collect_admin_email = Admin::where('email', $course_teacher_email)->get();

        //$count_related_course = Teachercourse::where('category_id', $course_category_id)->count();
        

        
        $related_course = Teachercourse::where('category_id',$course_category_id)->get();

        

       
        
        

        return view('admin.frontend.view_course',['all_category'=>$all_category,  'related_course'=>$related_course, 'collect_teacher_email'=>$collect_teacher_email, 'collect_admin_email'=>$collect_admin_email, 'all_course'=>$all_course,  'course_url'=>$course_url, 'course_image'=>$course_image, 'all_child_category'=>$all_child_category, 'all_sub_category'=>$all_sub_category], compact('course_short_details','course_title','course_intro_learn','course_requirements','course_description','current_course_id'));
    }

  


   
}
