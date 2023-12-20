<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;
use App\Models\Email;
use App\Models\RegUser;

use Session;


class MailController extends Controller
{
    public function index(Request $request){
        $id = Session::get('id');
        $user = RegUser::find($id);
        $emailAddress = $user->email;
        
        if(!isset($id)){
            return response()->json(['status'=>0,'message'=>"login first!"]);
        }
        else{
            $mail_data = Email::where('email_id',$emailAddress)->first();
           if(!isset($mail_data)){
       $sendMail =  Mail::to ($emailAddress)->send(new HelloMail());
       if($sendMail){
        $mail = new Email();
        $mail->email_id = $emailAddress;
        $mail->user_id = $id;
        $mail->status = 1;
        $mail->save();
        return response()->json(['status'=>1, 'message'=>"Mail send successfully"]);
    }
    else{
           return response()->json(['status'=>2, 'message'=>"Error Occured"]);
        }
    }
    else{
        return response()->json(['status'=>3, 'message'=>"This User Already Subscriber"]);
    }
    }

    }
}
