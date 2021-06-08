<?php

namespace App\Http\Controllers;

use App\Models\Socialdata;
use App\Models\Student;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use Stateless;
use App\Models\Teacher;
use File;


class SystemController extends Controller
{

    public function fbsub()
    {
        $type = 'teacher';
        $social_data = New Socialdata();
        $social_data->type = $type;
        $social_data->save();
        return Socialite::driver('facebook')->redirect();
    }

    public function fbres()
    {
        
        $social_data = Socialdata::all();

        foreach($social_data as $item)
        {
            $type = $item->type;
        }
        

        $user = Socialite::driver('facebook')->stateless()->user();
        // OAuth 2.0 providers...
        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;

        // OAuth 1.0 providers...
        $token = $user->token;
        // $tokenSecret = $user->tokenSecret;

        // All providers...
        $user_id = $user->getId();
        $user->getNickname();
        $user_name = $user->getName();
        $user_email = $user->getEmail();

        if($type=='student')
        {
            session()->put('session_student_email', $user_email);
            $img = $user->avatar_original . "&access_token={$user->token}";
            $count = Student::where('email', $user_email)->count();

            if($count==0)
            {
                $student = new Student;
                $student->first_name = $user_name;
                $student->email = $user_email;
                $student->id = $user_id;
    
                $fileContents = file_get_contents($img);
                File::put(public_path() . '/images/' . $user->getId() . ".jpg", $fileContents);
                // $picture = public_path('images' . $user->getId() . ".jpg");
                $picture = $user->getId();
                $jpg = ".jpg";
    
                $result = $picture . '' . $jpg;
    
    
                $student->image = $result;
                $student->save();
    
                session()->put('session_student_email', $user_email);
                return redirect('/student_dashboard');

            }else{

                session()->put('session_student_email', $user_email);
                return redirect('/student_dashboard');

            }

        }

        if($type=='teacher')
        {
            session()->put('session_teacher_email', $user_email);
            $img = $user->avatar_original . "&access_token={$user->token}";
            $count = Teacher::where('email', $user_email)->count();
            if ($count == 0) {

                $teacher = new Teacher;
                $teacher->first_name = $user_name;
                $teacher->email = $user_email;
                //$teacher->id = $user_id;
    
                $fileContents = file_get_contents($img);
                File::put(public_path() . '/images/' . $user->getId() . ".jpg", $fileContents);
                // $picture = public_path('images' . $user->getId() . ".jpg");
                $picture = $user->getId();
                $jpg = ".jpg";
    
                $result = $picture . '' . $jpg;
    
    
                $teacher->image = $result;
                $teacher->save();
    
                session()->put('session_teacher_email', $user_email);
                return redirect('/teacher_dashboard');
            } else {
    
                session()->put('session_teacher_email', $user_email);
                return redirect('/teacher_dashboard');
            }

        }

       


       

        
    }

    public function googlesub()
    {
        $type = 'teacher';
        $social_data = New Socialdata();
        $social_data->type = $type;
        $social_data->save();
        return Socialite::driver('google')->redirect();
    }

    public function googleres()
    {
        $social_data = Socialdata::all();

        foreach($social_data as $item)
        {
            $type = $item->type;
        }
        
        $user = Socialite::driver('google')->stateless()->user();

         // OAuth 2.0 providers...
         $token = $user->token;
         $refreshToken = $user->refreshToken;
         $expiresIn = $user->expiresIn;


           // OAuth 1.0 providers...
          $token = $user->token;
          // $tokenSecret = $user->tokenSecret;

          // All providers...
          $user_id = $user->getId();
          $user->getNickname();
          $user_name = $user->getName();
          $user_email = $user->getEmail();
          $user_image = $user->getAvatar();
       
       

        if($type=='student')
        {

            session()->put('session_teacher_email', $user_email);
            $count = Student::where('email', $user_email)->count();

            if ($count == 0) {

               

                $student = new Student;
                
                $student->first_name = $user_name;
                $student->email = $user_email;
               // $teacher->id = $user_id;
    
                $fileContents = file_get_contents($user_image);
                File::put(public_path() . '/images/' . $user->getId() . ".jpg", $fileContents);
                // $picture = public_path('images' . $user->getId() . ".jpg");
                $picture = $user->getId();
                $jpg = ".jpg";
    
                $result = $picture . '' . $jpg;
    
                $student->id = $user_id;
    
                
    
    
    
                $student->image = $result;
                
                $student->save();
    
                session()->put('session_student_email', $user_email);
                return redirect('/student_dashboard');
            } else {
    
                session()->put('session_student_email', $user_email);
                return redirect('/student_dashboard');
            }

        }

        if($type=='teacher')
        {
            session()->put('session_teacher_email', $user_email);
            $count = Teacher::where('email', $user_email)->count();

            if ($count == 0) {

                $teacher = new Teacher;
                $teacher->first_name = $user_name;
                $teacher->email = $user_email;
               // $teacher->id = $user_id;
    
                $fileContents = file_get_contents($user_image);
                File::put(public_path() . '/images/' . $user->getId() . ".jpg", $fileContents);
                // $picture = public_path('images' . $user->getId() . ".jpg");
                $picture = $user->getId();
                $jpg = ".jpg";
    
                $result = $picture . '' . $jpg;
    
                //$teacher->id = $user_id;
    
                
    
    
    
                $teacher->image = $result;
                
                $teacher->save();
    
                session()->put('session_teacher_email', $user_email);
                return redirect('/teacher_dashboard');
            } else {
    
                session()->put('session_teacher_email', $user_email);
                return redirect('/teacher_dashboard');
            }

        }

        
    }


    public function student_facebook()
    {
        
        $type = 'student';
        $social_data = New Socialdata();
        $social_data->type = $type;
        $social_data->save();
        return Socialite::driver('facebook')->redirect();
    }

    public function student_google()
    {
        $type = 'student';
        $social_data = New Socialdata();
        $social_data->type = $type;
        $social_data->save();
        return Socialite::driver('google')->redirect();
    }

   


}
