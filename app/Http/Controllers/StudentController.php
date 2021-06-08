<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function student_login()
    {
        
        return view('student.student_login');
    }
    public function index()
    {
        return view('student.student_registration');
    }

    public function student_registration_post(Request $request)
    {
        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $phone = $request->input('phone');

        $password_length = strlen($password);

        if ($password_length > 7) {

            if ($password == $confirm_password) {
                $email_check = Student::where('email', $email)->count();
                if ($email_check == 0) {
                    $student = new Student();
                    $student->first_name = $first_name;
                    $student->email = $email;
                    $student->password = $password;
                    //$teacher->confirm_password = $confirm_password;
                    $student->phone = $phone;

                    $student->save();
                    return redirect('/student_login')->with('success', 'You have registred successfully');
                } else {
                    return redirect('/')->with('email_match_error', 'This email has already used');
                }
            } else {
                return redirect('/')->with('password_error', 'Confirm password doesnot match');
            }
        } else {
            return redirect('/')->with('length_error', 'Password must be 8 characters');
        }
    }

    public function student_login_post(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        

        $check_student = Student::where('email',$email)->where('password', $password)->count();
        if($check_student==1)
        {
            session()->put('session_student_email', $email);
            return redirect('/student_dashboard');
        }else{
            return redirect('/student_login')->with('login_error', 'Error your email or password');
        }


    }

    public function student_dashboard()
    {
        $title = 'Student|Dashboard|Page';
        $session_student_email = session()->get('session_student_email');
        if($session_student_email)
        {
            $student_data = Student::where('email',$session_student_email)->get();
            $my_profile = 'active';
            $my_course = '';
            $my_wishlist = '';
            $purchase_history = '';
            $become_instructor = '';
            $bank_details = '';
            return view('student.student_dashboard',['student_data'=>$student_data], compact('title','my_profile','my_course','my_wishlist','purchase_history','become_instructor','bank_details'));
        }else{
            return redirect('/student_login');
        }
    }

    public function bank_details()
    {
        $title = 'Student|Bank-Details|Page';
        $my_profile = '';
        $my_course = '';
        $my_wishlist = '';
        $purchase_history = '';
        $become_instructor = '';
        $bank_details = 'active';

        $session_student_email = session()->get('session_student_email');
        $student_data = Student::where('email',$session_student_email)->get();
        return view('student.bank_details', ['student_data'=>$student_data], compact('title','my_profile','my_course','my_wishlist','purchase_history','become_instructor','bank_details'));
    }

    public function add_bank()
    {

        $title = 'Student|Bank-Information|Page';
        $my_profile = '';
        $my_course = '';
        $my_wishlist = '';
        $purchase_history = '';
        $become_instructor = '';
        $bank_details = 'active';

        $session_student_email = session()->get('session_student_email');
        $student_data = Student::where('email',$session_student_email)->get();
        return view('student.add_bank', ['student_data'=>$student_data], compact('title','my_profile','my_course','my_wishlist','purchase_history','become_instructor','bank_details'));
        
    }

    public function student_instructor()
    {

        $title = 'Student|Instructor|Page';
        $my_profile = '';
        $my_course = '';
        $my_wishlist = '';
        $purchase_history = '';
        $become_instructor = 'active';
        $bank_details = '';

        $session_student_email = session()->get('session_student_email');
        $student_data = Student::where('email',$session_student_email)->get();
        return view('student.instructor', ['student_data'=>$student_data], compact('title','my_profile','my_course','my_wishlist','purchase_history','become_instructor','bank_details'));

    }

    public function student_logout()
    {
        Session::flush();
        return redirect('/student_login');
    }

    public function student_forgot_password()
    {
        return view('student_forgot');
    }

    public function student_forgot_password_post(Request $request)
    {
        $email = $request->input('email');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        $password_length = strlen($new_password);
        if($password_length > 7)
        {
            if($new_password==$confirm_password)
            {
                $check = Student::where('email',$email)->count();
                if($check==1)
                {
                    $student = new Student;
                    $student_data = Student::where('email',$email)->get();

                    foreach($student_data as $item)
                    {
                        $student_id = $item->id;
                        
                    }
                    $student =Student::find($student_id);
                    $student->password = $new_password;
                    $student->save();

                   
                    
                    return redirect('/student_login')->with('change_password', 'You have successfully change of your password');

                }else{
                    return redirect('/student_forgot_password')->with('email_error', 'Please give your correct email');
                }

            }else{
                return redirect('/student_forgot_password')->with('confirm_password_error', "Confirm password doesn't match");
            }

        }else{
            return redirect('/student_forgot_password')->with('length_error', 'Yor password at least 8 character');
        }
    }

}
