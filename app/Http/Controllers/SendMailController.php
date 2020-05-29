<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Mail;

class SendMailController extends Controller
{

    
    public function index()
    {

        return view('admin.sendmail');
    }
    public function send()
    {
        $fulltext=Input::get('fulltext');
        $to_name=Input::get('to');
        $from=Input::get('from');
        $subject=Input::get('subject');
        
        $to='intelegendsnd2@gmail.com';
        $_SESSION['messagetext']=$fulltext;
        $data = array('name'=>"Intel", "body" => 'Body');
        if(stristr($from, ','))
        {
            
            $arr = preg_split("/[\s,]+/",$from);
            
                Mail::send('mail.feedback', $data, function($message) use ($to_name,$to,$subject,$arr) {
                    
                    for($i = 0; $i <= count($arr)-1; $i++)
                    {
                        $message->to($arr[$i], $to_name)->subject($subject);
                        $_SESSION['mail']=$to_name;
                        $message->from($arr[$i],$to_name);
                    }
                }); 
        }
        else
        {
            $arr = preg_split("/[\s,]+/",$from);
            Mail::send('mail.feedback', $data, function($message) use ($to_name,$to,$subject,$from) {
                $message->to($from, $to_name)->subject($subject);
                $_SESSION['mail']=$to_name;
                $message->from($from,$to_name);
                });
        }

        return view('admin.sendmail');
        
    }
}
