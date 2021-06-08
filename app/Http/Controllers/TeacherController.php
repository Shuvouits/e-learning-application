<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Teacher;
use App\Models\Teachercategory;
use App\Models\Teachersubcategory;
use App\Models\Icon;
use App\Models\Teacherchildcategory;

use Illuminate\Support\Facades\Session;
use App;
use App\Models\Teacherannouncement;
use App\Models\Teacheranswer;
use App\Models\Teacherblog;
use App\Models\Teachercourse;
use App\Models\Teacherlanguage;
use App\Models\Teacherquestion;
use App\Models\Teacherfeaturedcourse;
use \PDF;

class TeacherController extends Controller
{
    //
    public function teacher_login()
    {
        return view('teacher_login');
    }

    public function teacher_register()
    {
        return view('teacher_register');
    }

    public function teacher_registration_post(Request $request)
    {
        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $phone = $request->input('phone');

        $password_length = strlen($password);

        if($password_length > 7)
        {

            if($password==$confirm_password)
            {
                $email_check = Teacher::where('email',$email)->count();
                if($email_check==0)
                {
                    $teacher = new Teacher;
                    $teacher->first_name = $first_name;
                    $teacher->email = $email;
                    $teacher->password = $password;
                    //$teacher->confirm_password = $confirm_password;
                    $teacher->phone = $phone;
        
                    $teacher->save();
                    return redirect('/teacher_login')->with('success', 'You have registred successfully');

                }else{
                    return redirect('/teacher_register')->with('email_match_error', 'This email has already used');
                }
               
    
            }else{
                return redirect('/teacher_register')->with('password_error', 'Confirm password doesnot match');
            }


        }else{
            return redirect('/teacher_register')->with('length_error', 'Password must be 8 characters');
        }

    }

    public function teacher_login_post(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        

        $check_teacher = Teacher::where('email',$email)->where('password', $password)->count();
        if($check_teacher==1)
        {
            session()->put('session_teacher_email', $email);
           // $teacher_email = session()->get('session_teacher_email');
           // echo $teacher_email;
            return redirect('/teacher_dashboard');
        }else{
            return redirect('/teacher_login')->with('login_error', 'Error your email or password');
        }
    }

    public function teacher_dashboard()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        
            $title = 'Teacher|Dashboard|Page';

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
            

            //End menu
        
            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.dashboard',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        
    }

    public function teacher_dashboard_language($locale)
    {
        
        App::setLocale($locale);
        session()->put('locale_language', $locale);

        $session_teacher_email = session()->get('session_teacher_email');
        $title = 'Teacher|Dashboard|Page|$locale';

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
         $language = $locale;

         $teacher_data = Teacher::where('email',$session_teacher_email)->get();
         return view('teacher.dashboard',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
    }

    public function teacher_logout()
    {
        Session::flush();
        return redirect('/teacher_register');
    }

    public function teacher_forgot_password()
    {
        return view('teacher_forgot');
    }

    public function teacher_forgot_password_post(Request $request)
    {
        $email = $request->input('email');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        $password_length = strlen($new_password);
        if($password_length > 7)
        {
            if($new_password==$confirm_password)
            {
                $check = Teacher::where('email',$email)->count();

                if($check==1)
                {
                    $teacher = new Teacher;
                    $teacher_data = Teacher::where('email', $email)->get();

                    foreach($teacher_data as $item)
                    {
                        $teacher_id = $item->id;
                    }
                    $teacher = Teacher::find($teacher_id);
                    $teacher->password = $new_password;
                    $teacher->save();

                    return redirect('/teacher_login')->with('change_password', 'You have successfully changed of your new password');

                }else{
                    
                    return redirect('/teacher_forgot_password')->with('email_error', 'Please give your correct email');
                }

            }else{
                return redirect('/teacher_forgot_password')->with('confirm_password_error', "Confirm password doesn't match");
            }

        }else{
            return redirect('/teacher_forgot_password')->with('length_error', 'Yor password at least 8 character');
        }
    }

    public function teacher_category()
    {
        $session_teacher_email = session()->get('session_teacher_email');

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
        
        
            $title = 'Teacher | Category';

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
           // $language = "$locale_language";



            $teacher_data = Teacher::where('email',$session_teacher_email)->get();

            $all_category_data = Teachercategory::all();
            $icon = Icon::all();

            return view('teacher.category',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'icon'=>$icon], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        

    }

    public function teacher_sub_category()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Sub | Category';

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



            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $icon = Icon::all();
            return view('teacher.sub_category',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_child_category()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Child | Category';

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
 


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $child_category_data = Teacherchildcategory::all();
            $icon = Icon::all();
            return view('teacher.child_category',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'child_category_data'=>$child_category_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_course()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Course';

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
            $course_open='menu-open';
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


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $all_teacher_course = Teachercourse::all();
            $icon = Icon::all();
            

            return view('teacher.course',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'all_teacher_course'=>$all_teacher_course], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_course_language()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Course | Language';

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
            $course_open='menu-open';
            $course = '';
            $course_language='active';
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



            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_language_data = Teacherlanguage::all();
            return view('teacher.course_language',['teacher_data'=>$teacher_data, 'all_language_data'=>$all_language_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_request_involve()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Request | Involve';

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
            $multiple_instructor='menu-open';
            $request_involve='active';
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



            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.request_involve',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_involvement_request()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Involvement | Request';

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
           $multiple_instructor='menu-open';
           $request_involve='';
           $involvement_request='active';
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


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.involvement_request',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_involve_course()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Involve | Course';

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
            $multiple_instructor='menu-open';
            $request_involve='';
            $involvement_request='';
            $involve_course = 'active';
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
 


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.involve_course',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_user_enrolled()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | User | Enrolled';

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
            $multiple_instructor='menu-open';
            $request_involve='';
            $involvement_request='';
            $involve_course = '';
            $user_enrolled = 'active';
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
 


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.user_enrolled',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_question_answer()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Question | Answer';

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
            $question = 'active';
            $question_menu='menu-open';
            $answer = '';
            $announcement='';
            $blog='';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_course = Teachercourse::all();
            $teacher_question = Teacherquestion::all();
            return view('teacher.question',['teacher_data'=>$teacher_data, 'teacher_course'=>$teacher_course, 'teacher_question'=>$teacher_question], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

  

    public function teacher_answer()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Answer';

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
            $question_menu='menu-open';
            $answer = 'active';
            $announcement='';
            $blog='';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';

            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_answer = Teacheranswer::all();
            return view('teacher.answer',['teacher_data'=>$teacher_data, 'teacher_answer'=>$teacher_answer], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_announcement()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Answer';

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
            $announcement='active';
            $blog='';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_course = Teachercourse::all();
            $all_announcement = Teacherannouncement::all();
            return view('teacher.announcement',['teacher_data'=>$teacher_data, 'all_course'=>$all_course, 'all_announcement'=> $all_announcement], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_blog()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Blog';

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
            $blog='active';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_blog = Teacherblog::all();
            return view('teacher.blog',['teacher_data'=>$teacher_data, 'teacher_blog'=>$teacher_blog], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting', 'language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_featured_course()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Feature | Course';

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
            $featured_course='active';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_course = Teachercourse::all();
            $all_featured_course = Teacherfeaturedcourse::all();
            return view('teacher.featured_course',['teacher_data'=>$teacher_data, 'teacher_course'=>$teacher_course, 'all_featured_course'=>$all_featured_course], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_pending_payout()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Pending | Payout';

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

            $dashboard='';
            $category='';
            $category_open='';
            $sub_category='';
            $child_category='';
            $course='';
            $course_open = '';
            $course_language='';
            $request_involve='';
            $multiple_instructor='';
            $involvement_request='';
            $involve_course = '';
            $user_enrolled = '';
            $question = '';
            $question_menu='';
            $answer = '';
            $announcement = '';
            $blog = '';
            $featured_course='';
            $pending_payout='active';
            $completed_payout = "";
            $my_revenue='menu-open';
            $payment_setting="";


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.pending_payout',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course','course_open','course_language','request_involve','multiple_instructor','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','completed_payout','pending_payout','my_revenue','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_completed_payout()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Completed | Payout';

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

            $dashboard='';
            $category='';
            $category_open='';
            $sub_category='';
            $child_category='';
            $course='';
            $course_open = '';
            $course_language='';
            $request_involve='';
            $multiple_instructor='';
            $involvement_request='';
            $involve_course = '';
            $user_enrolled = '';
            $question = '';
            $question_menu='';
            $answer = '';
            $announcement = '';
            $blog = '';
            $featured_course='';
            $pending_payout='';
            $my_revenue='menu-open';
            $completed_payout = 'active';
            $payment_setting="";


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.completed_payout',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course','course_open','course_language','request_involve','multiple_instructor','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','language','payment_setting'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_payment_setting()
    {
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Payment | Setting';

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

            $dashboard='';
            $category='';
            $category_open='';
            $sub_category='';
            $child_category='';
            $course='';
            $course_open = '';
            $course_language='';
            $request_involve='';
            $multiple_instructor='';
            $involvement_request='';
            $involve_course = '';
            $user_enrolled = '';
            $question = '';
            $question_menu='';
            $answer = '';
            $announcement = '';
            $blog = '';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout = '';
            $payment_setting = 'active';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            return view('teacher.payment_setting',['teacher_data'=>$teacher_data], compact('title','dashboard','category','category_open','sub_category','child_category','course','course_open','course_language','request_involve','multiple_instructor','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function ajax_payment_setting(Request $request)
    {
        $name = $request->input('name');

        if($name=='Paytm')
        {
            $output = ' 
                         <div class="col-md-6" style="margin-left:-8px">

                             <div class="form-group">
                                 <br>
                                 PAYTM PAYMENT<br>
                                 <label style="margin-top:5px">Paytm Mobile no*</label>
                                 <input type="text" class="form-control" >
                            </div>
                         
                         </div>
                       
                      ';

        }
        if($name=='Paypal')
        {
            $output = '
            
                        <div class="col-md-6"  style="margin-left:-8px">

                        <div class="form-group">
                          <br>
                          PAYPAL PAYMENT<br>
                          <label style="margin-top:5px">Paypal Email*</label>
                          <input type="email" class="form-control" value="info@gmail.com" >
                        </div>
                        
                        </div>
                        
                      '
                      ;

        }
        if($name=='Bank')
        {
            $output = '

            <div class="col-md-12"  style="margin-left:-8px">

                <div class="row">
                    
                    <div class="col-md-6">

                        <div class="form-group">
                             <label style="margin-top:5px">Account Holder Name*</label>
                             <input type="text" class="form-control" value="34567" >
                        </div>

                        <div class="form-group">
                             <label style="margin-top:5px">IFCS code*</label>
                             <input type="text" class="form-control" value="sghfd" >
                       </div>
                    
                    </div>

                    <div class="col-md-6">

                         <div class="form-group">
                         <label style="margin-top:5px">Bank Name*</label>
                         <input type="text" class="form-control" value="1234567" >
                        </div>

                        <div class="form-group">
                         <label style="margin-top:5px">Account Number*</label>
                         <input type="text" class="form-control" value="sghfd" >
                        </div>
                
                    </div>
                    
                
                </div>
            
            </div>
            
            
            
                      ';

        }
       
        echo json_encode($output);
    }

    public function teacher_add_category(Request $request)
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

         return redirect('/teacher_category')->with('add_category', 'Category Added Successfully');

    }

    public function teacher_edit_category_show($id)
    {

        $edit_category_all_data = Teachercategory::where('id',$id)->get();

        
        
        //edit data end
        $session_teacher_email = session()->get('session_teacher_email');

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
        
        
            $title = 'Teacher | Edit | Category';

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
           // $language = "$locale_language";



            $teacher_data = Teacher::where('email',$session_teacher_email)->get();

            $all_category_data = Teachercategory::all();
            $icon = Icon::all();

            return view('teacher.edit_category',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'icon'=>$icon, 'edit_category_all_data'=>$edit_category_all_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        

    }

    public function teacher_edit_category(Request $request)
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

         return redirect('/teacher_category')->with('edit_category', 'Category Edited Successfully');

    }

    public function teacher_category_delete($id)
    {
        $target_category_data = Teachercategory::find($id);
        $target_category_data->delete();

        $target_subcategory_data = Teachersubcategory::where('category_id', $id)->delete();
        
        $target_childcategory_data = Teacherchildcategory::where('category_id', $id)->delete();
        

        return redirect('/teacher_category')->with('delete_category', 'Category Deleted Successfully');
    }

    

    public function teacher_Category_status($id)
    {
    
        
        $teacher_category = Teachercategory::find($id);
        $current_status = $teacher_category->status;
        if($current_status == 'Enable')
        {
            $teacher_category->status = "Disable";
            $teacher_category->save();
        }

        if($current_status == 'Disable')
        {
            $teacher_category->status = "Enable";
            $teacher_category->save();
        }

       return redirect('/teacher_category');

    }

    public function teacher_add_subCategory(Request $request)
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

        return redirect('/teacher_sub_category')->with('add_subcategory', 'New Sub Category Added Successfully' );

        
         
         
        
    }

    public function teacher_subCategory_status($id)
    {
    
        
        $teacher_subcategory = Teachersubcategory::find($id);
        $current_status = $teacher_subcategory->status;
        if($current_status == 'Enable')
        {
            $teacher_subcategory->status = "Disable";
            $teacher_subcategory->save();
        }

        if($current_status == 'Disable')
        {
            $teacher_subcategory->status = "Enable";
            $teacher_subcategory->save();
        }

       return redirect('/teacher_sub_category');

    }

    public function teacher_sub_category_edit_show($id)
    {
        $edit_subcategory_all_data = Teachersubcategory::where('id', $id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Sub | Category';

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



            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $icon = Icon::all();
            return view('teacher.edit_subcategory',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'edit_subcategory_all_data' => $edit_subcategory_all_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_edit_subcategory(Request $request)
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

         return redirect('/teacher_sub_category')->with('edit_subcategory','One Item Update Successfully');

    }

    public function teacher_subcategory_delete($id)
    {
        $target_data = Teachersubcategory::find($id);

        $delete_child_category_data = Teacherchildcategory::where('subcategory_id', $id)->delete();
        $target_data->delete();
        return redirect('/teacher_sub_category')->with('delete_subcategory', 'One Item Deleted Successfully');

    }

    public function teacher_ajax_category(Request $request)
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

    public function teacher_add_child_category(Request $request)
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
        return redirect('/teacher_child_category')->with('add_child_category', 'New Child Category Added');

    }

    public function teacher_childCategory_status($id)
    {
    
        
        $teacher_childcategory = Teacherchildcategory::find($id);
        $current_status = $teacher_childcategory->status;
        if($current_status == 'Enable')
        {
            $teacher_childcategory->status = "Disable";
            $teacher_childcategory->save();
        }

        if($current_status == 'Disable')
        {
            $teacher_childcategory->status = "Enable";
            $teacher_childcategory->save();
        }

       return redirect('/teacher_child_category');

    }

    public function teacher_child_category_edit_show($id)
    {
        $edit_childcategory_all_data = Teacherchildcategory::where('id',$id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Child | Category';

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
 


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $child_category_data = Teacherchildcategory::all();
            $icon = Icon::all();
            return view('teacher.edit_child_category',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'child_category_data'=>$child_category_data, 'edit_childcategory_all_data'=>$edit_childcategory_all_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_ajax_child_category_edit(Request $request)
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

    public function teacher_edit_childcategory(Request $request)
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

         return redirect('/teacher_child_category')->with('edit_child_category', 'One Item Updated Successfully');

    }

    public function teacher_childcategory_delete($id)
    {
        $target_data = Teacherchildcategory::find($id);
        $target_data->delete();
        return redirect('/teacher_child_category')->with('delete_child_category', 'One Item Deleted Successfully');

    }

    public function teacher_ajax_course_category(Request $request)
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

    public function teacher_ajax_course_subcategory(Request $request)
    {
        $id = $request->input('id');
        $get_child_cat = Teacherchildcategory::where('subcategory_id', $id)->get();
        $cap = array('get_child_cat' => $get_child_cat);
        $output = '<option>Select subcategory</option>';

        foreach ($get_child_cat as $key) {
            $output .= '<option value=" ' . $key->id . ' ">' . $key->title . '</option>';
        }

       
        echo json_encode($output);
    }

    public function teacher_add_course(Request $request)
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
        $appointment_option = $request->input('appointment_option');
        $certificate = $request->input('certificate');
        $price = $request->input('price');
        $video_url = $request->input('video_url');
        $title = $request->input('course_title');
        $teacher_email = $request->input('teacher_email');

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
         $teacher_course->details = $details;
         $teacher_course->pay_option = $payment_option;
         $teacher_course->course_duration = $course_duration;
         $teacher_course->course_price = $price;
         $teacher_course->upload_video = $video;
         $teacher_course->url = $video_url;
         $teacher_course->image = $image;
         $teacher_course->assignment_option = $assignment_option;
         $teacher_course->appointment_option = $appointment_option;
         $teacher_course->certificate_option = $certificate;
         $teacher_course->save();

        return redirect('/teacher_course')->with('add_course', 'New Course Added Successfully');
    }

    public function teacher_course_edit_show($id)
    {
        $course_edit_data = Teachercourse::where('id',$id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Course';

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
            $course_open='menu-open';
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


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_category_data = Teachercategory::all();
            $sub_category_data = Teachersubcategory::all();
            $all_teacher_course = Teachercourse::all();
            $icon = Icon::all();

            return view('teacher.edit_course',['teacher_data'=>$teacher_data, 'all_category_data'=>$all_category_data, 'sub_category_data'=>$sub_category_data, 'icon'=>$icon, 'all_teacher_course'=>$all_teacher_course, 'course_edit_data'=>$course_edit_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }



    public function teacher_edit_course(Request $request)
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
        $payment_option = $request->input('payment_option');
        $course_duration = $request->input('course_duration');
        $assignment_option = $request->input('assignment_option');
        $appointment_option = $request->input('appointment_option');
        $certificate = $request->input('certificate');
        $price = $request->input('price');
        $video_url = $request->input('video_url');
        $title = $request->input('course_title');

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
         
         $teacher_course->pay_option = $payment_option;
         $teacher_course->course_duration = $course_duration;
         $teacher_course->course_price = $price;
         $teacher_course->upload_video = $video;
         $teacher_course->url = $video_url;
         $teacher_course->image = $image;
         $teacher_course->assignment_option = $assignment_option;
         $teacher_course->appointment_option = $appointment_option;
         $teacher_course->certificate_option = $certificate;
         $teacher_course->save();

        return redirect('/teacher_course')->with('edit_course','One Course Updated Successfully');
    }

    public function teacher_course_delete($id)
    {
        $target_data = Teachercourse::find($id);
        $target_data->delete();
        return redirect('/teacher_course')->with('delete_course', 'Deleted Course Successfully'); 
    }

    public function teacher_ajax_course_category_edit(Request $request)
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

    public function teacher_ajax_course_subcategory_edit(Request $request)
    {
        $id = $request->input('id');
        $get_child_cat = Teacherchildcategory::where('subcategory_id', $id)->get();
        $cap = array('get_child_cat' => $get_child_cat);
        $output = '<option>Select subcategory</option>';

        foreach ($get_child_cat as $key) {
            $output .= '<option value=" ' . $key->id . ' ">' . $key->title . '</option>';
        }

       
        echo json_encode($output);
    }

    public function teacher_ajax_course_slug(Request $request)
    {
        $title = $request->input('title');
        $slug = Str::of($title)->slug('-');
        $output = $slug;
        echo json_encode($output);
    }

    public function teacher_add_language(Request $request)
    {
        $language = $request->input('language');
        $status = $request->input('status');
        $teacher_language = New Teacherlanguage();
        $teacher_language->name = $language;
        $teacher_language->status = $status;
        $teacher_language->save();
        return redirect('/teacher_course_language')->with('add_language', 'New Language Added Successfully');
    }

    public function teacher_language_status($id)
    {
        $teacher_language = Teacherlanguage::find($id);
        $current_status = $teacher_language->status;
        if($current_status == 'Enable')
        {
            $teacher_language->status = "Disable";
            $teacher_language->save();
        }

        if($current_status == 'Disable')
        {
            $teacher_language->status = "Enable";
            $teacher_language->save();
        }

       return redirect('/teacher_course_language');
        
    }

    public function teacher_course_language_edit(Request $request)
    {
        $language_name = $request->input('language_name');
        $id = $request->input('id');
    
        $status = $request->input('status');

        
         $teacher_language = Teacherlanguage::find($id);
         $teacher_language->name = $language_name;
         $teacher_language->status = $status;

         $teacher_language->save();

         return redirect('/teacher_course_language')->with('edit_language', 'One Language Edit Successfully');

    }

    public function teacher_course_language_delete($id)
    {
        $teacher_language = Teacherlanguage::find($id);
        $teacher_language->delete();
        return redirect('/teacher_course_language')->with('delete_language', 'One Item has been Deleted');
    }

    public function add_teacher_question(Request $request)
    {
        $course = $request->input('course');
        $question = $request->input('question');
        $status = $request->input('status');
        $teacher_name = $request->input('teacher_name');

        $teacher_question = New Teacherquestion();
        $teacher_question->course_name = $course;
        $teacher_question->question = $question;
        $teacher_question->status = $status;
        $teacher_question->teacher_name = $teacher_name;
        $teacher_question->save();
        return redirect('/teacher_question_answer')->with('add_question', 'New Question Added Successfully');
    }

    public function teacher_question_answer_status($id)
    {
        $teacher_question = Teacherquestion::find($id);
        $status = $teacher_question->status;
        if($status=='Active'){
            $teacher_question->status = 'Inactive';
            $teacher_question->save();
        }else{
            $teacher_question->status = 'Active';
            $teacher_question->save();
        }
        
        return redirect('/teacher_question_answer');
    }

    
    public function teacher_question_answer_edit_show($id)
    {
        $teacher_question_data = Teacherquestion::where('id',$id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Question | Answer';

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
            $question = 'active';
            $question_menu='menu-open';
            $answer = '';
            $announcement='';
            $blog='';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_course = Teachercourse::all();
            $teacher_question = Teacherquestion::all();
            return view('teacher.edit_question',['teacher_data'=>$teacher_data, 'teacher_course'=>$teacher_course, 'teacher_question'=>$teacher_question, 'teacher_question_data'=>$teacher_question_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_question_asnwer_edit(Request $request)
    {
        $question = $request->input('question');
        $status = $request->input('status');
        $id = $request->input('id');

        $teacher_question = Teacherquestion::find($id);
        $teacher_question->question = $question;
        $teacher_question->status = $status;
        $teacher_question->save();
        return redirect('/teacher_question_answer')->with('edit_question', 'Update Answer Successfully');

    }

    public function teacher_question_answer_delete($id)
    {
        $teacher_question = Teacherquestion::find($id);
        $teacher_question->delete();
        return redirect('/teacher_question_answer')->with('delete_question', 'One Item Deleted Successfully');
    }

    public function teacher_answer_status($id){
        $teacher_answer = Teacheranswer::find($id);
        $status = $teacher_answer->status;
        if($status=='Active'){
            $teacher_answer->status = 'Inactive';
            $teacher_answer->save();
        }else{
            $teacher_answer->status = 'Active';
            $teacher_answer->save();
        }
        return redirect('/teacher_answer');

    }

    public function teacher_annoucement_add(Request $request)
    {
        $course = $request->input('course');
        
        $announcement = $request->input('announcement');
        $status = $request->input('status');

        $teacher_announcement = New Teacherannouncement();
        $teacher_announcement->course = $course;
        $teacher_announcement->announcement = $announcement;
        $teacher_announcement->status = $status;
        $teacher_announcement->save();
        return redirect('/teacher_announcement')->with('add_announcement', 'Adding New Announcement Successfully');
    }

    public function teacher_annoucement_status($id){
        $teacher_announcement = Teacherannouncement::find($id);
        $status = $teacher_announcement->status;

        if($status=='Active'){
            $teacher_announcement->status='Deactive';
            $teacher_announcement->save();
        }else{
            $teacher_announcement->status='Active';
            $teacher_announcement->save();

        }
        return redirect('/teacher_announcement');

    }


    public function teacher_announcement_edit($id)
    {
        $announcement_edit = Teacherannouncement::where('id', $id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Answer';

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
            $announcement='active';
            $blog='';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $all_course = Teachercourse::all();
            
            return view('teacher.edit_announcement',['teacher_data'=>$teacher_data, 'all_course'=>$all_course, 'announcement_edit'=> $announcement_edit], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }
    }

    public function announcement_edit(Request $request)
    {
        $announcement = $request->input('announcement');
        $status = $request->input('status');
        $id = $request->input('id');

        $teacher_announcement = Teacherannouncement::find($id);
        $teacher_announcement->announcement = $announcement;
        $teacher_announcement->status = $status;
        $teacher_announcement->save();
        return redirect('/teacher_announcement')->with('edit_announcement', 'Announcement Update Successfully');
    }

    public function teacher_announcement_delete($id)
    {
        $teacher_announcement = Teacherannouncement::find($id);
        $teacher_announcement->delete();
        return redirect('/teacher_announcement')->with('delete_announcement', 'Delete Announcement Successfully');
    }

    public function teacher_blog_add(Request $request)
    {
       $date = $request->input('date');
       $headings = $request->input('headings');
       $button_text = $request->input('button_text');
       $details = $request->input('details');
       $teacher_name = $request->input('teacher_name');

       $msg = "";
       $image = $_FILES['image']['name'];
       $target = "images/" . basename($image);

       if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
           $msg = "Image uploaded successfully";
       } else {
           $msg = "Failed to upload image";
       }

       $teacher_blog = New Teacherblog();
       $teacher_blog->date = $date;
       $teacher_blog->headings = $headings;
       $teacher_blog->text = $button_text;
       $teacher_blog->image = $image;
       $teacher_blog->details = $details;
       $teacher_blog->teacher_email = $teacher_name;
       $teacher_blog->save();
       return redirect('/teacher_blog')->with('blog_add', 'New Blog Added Successfully');
       
    }

    
    public function teacher_blog_edit($id)
    {
        $teacher_blog_edit_data = Teacherblog::where('id', $id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Blog';

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
            $blog='active';
            $featured_course='';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_blog = Teacherblog::all();
            return view('teacher.edit_blog',['teacher_data'=>$teacher_data, 'teacher_blog'=>$teacher_blog, 'teacher_blog_edit_data'=>$teacher_blog_edit_data], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting', 'language'));
        }else{
            return redirect('/teacher_login');
        }

    }

    public function teacher_blog_edit_post(Request $request)
    {
        $headings = $request->input('headings');
        $button_text = $request->input('button_text');
        $details = $request->input('details');
        $id = $request->input('id');

       
        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);
 
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $teacher_blog = Teacherblog::find($id);
        $teacher_blog->headings = $headings;
        $teacher_blog->text = $button_text;
        $teacher_blog->details = $details;
        $teacher_blog->image = $image;
        $teacher_blog->save();
        return redirect('/teacher_blog')->with('edit_blog', 'One Item Edit Successfully');



    }

    public function teacher_blog_delete($id)
    {
        $target_data = Teacherblog::find($id);
        $target_data->delete();
        return redirect('/teacher_blog')->with('delete_blog', 'One Item Deleted Successfully');
    }

    public function teacher_featured_course_add(Request $request)
    {
        $course_id = $request->input('course');
        $find_course = Teachercourse::where('id', $course_id)->get();
        foreach($find_course as $item)
        {
            $course_name = $item->title;
            $teacher_email = $item->teacher_email;
            
        }

        $featured_course = New Teacherfeaturedcourse();
        $featured_course->featured_course_name = $course_name;
        $featured_course->course_id = $course_id;
        $featured_course->teacher_email = $teacher_email;
        $featured_course->save();
        return redirect('/teacher_featured_course')->with('featured_add', 'New Featured Course Added');

        
    }

    public function teacher_featured_course_delete($id){
        $target_data = Teacherfeaturedcourse::find($id);
        $target_data->delete();
        return redirect('/teacher_featured_course')->with('delete_featured', 'One Item Deleted Successfully');
    }

   

    public function teacher_featured_course_view($id)
    {
        $view_course = Teachercourse::where('id', $id)->get();
        $session_teacher_email = session()->get('session_teacher_email');
        if($session_teacher_email)
        {
            $title = 'Teacher | Feature | Course';

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
            $featured_course='active';
            $pending_payout='';
            $my_revenue='';
            $completed_payout='';
            $payment_setting='';


            $teacher_data = Teacher::where('email',$session_teacher_email)->get();
            $teacher_course = Teachercourse::all();
            $all_featured_course = Teacherfeaturedcourse::all();
            return view('teacher.view_featured_course',['teacher_data'=>$teacher_data, 'teacher_course'=>$teacher_course, 'all_featured_course'=>$all_featured_course, 'view_course'=>$view_course], compact('title','dashboard','category','category_open','sub_category','child_category','course_open','course','course_language','multiple_instructor','request_involve','involvement_request','involve_course','user_enrolled','question','question_menu','answer','announcement','blog','featured_course','pending_payout','my_revenue','completed_payout','payment_setting','language'));
        }else{
            return redirect('/teacher_login');
        }

    }

   

   
    
        
      

    

   

   

    

    
}
