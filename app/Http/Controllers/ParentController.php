<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Guardian;

class ParentController extends Controller
{
    //
    public function parent_register()
    {
        return view('parent_register');
    }

    public function parent_login()
    {
        return view('parent_login');
    }

    public function parent_registration_post(Request $request)
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
                $email_check = Guardian::where('email',$email)->count();
                if($email_check==0)
                {
                    $guardian = new Guardian();
                    $guardian->first_name = $first_name;
                    $guardian->email = $email;
                    $guardian->password = $password;
                    //$teacher->confirm_password = $confirm_password;
                    $guardian->phone = $phone;
        
                    $guardian->save();
                    return redirect('/parent_login')->with('success', 'You have registred successfully');

                }else{
                    return redirect('/parent_register')->with('email_match_error', 'This email has already used');
                }
               
    
            }else{
                return redirect('/parent_register')->with('password_error', 'Confirm password doesnot match');
            }


        }else{
            return redirect('/guardian_register')->with('length_error', 'Password must be 8 characters');
        }

    }

    public function Parent_login_post(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        

        $check_guardian = Guardian::where('email',$email)->where('password', $password)->count();
        if($check_guardian==1)
        {
            session()->put('session_guardian_email', $email);
            return redirect('/parent_dashboard');
        }else{
            return redirect('/parent_login')->with('login_error', 'Error your email or password');
        }
    }

    public function parent_dashboard()
    {
        $session_guardian_email = session()->get('session_guardian_email');
        if($session_guardian_email)
        {
            $guardian_data = Guardian::where('email',$session_guardian_email)->get();
            return view('parent_dashboard',['guardian_data'=>$guardian_data]);
        }else{
            return redirect('/parent_login');
        }
    }

    public function parent_logout()
    {
        Session::flush();
        return redirect('/parent_register');
    }

    public function parent_forgot_password()
    {
        return view('parent_forgot');
    }

    public function parent_forgot_password_post(Request $request)
    {
        $email = $request->input('email');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        $password_length = strlen($new_password);
        if($password_length > 7)
        {
            if($new_password==$confirm_password)
            {
                $check = parent::where('email',$email)->count();

                if($check==1)
                {
                    $guardian = new Guardian;
                    $guardian_data = Guardian::where('email', $email)->get();

                    foreach($guardian_data as $item)
                    {
                        $guardian_id = $item->id;
                    }
                    $guardian = Guardian::find($guardian_id);
                    $guardian->password = $new_password;
                    $guardian->save();

                    return redirect('/parent_login')->with('change_password', 'You have successfully changed of your new password');

                }else{
                    
                    return redirect('/parent_forgot_password')->with('email_error', 'Please give your correct email');
                }

            }else{
                return redirect('/parent_forgot_password')->with('confirm_password_error', "Confirm password doesn't match");
            }

        }else{
            return redirect('/parent_forgot_password')->with('length_error', 'Yor password at least 8 character');
        }
    }

}
