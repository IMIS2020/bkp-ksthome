<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUsMail;
use Auth;

class ContactUsController extends Controller
{
    public function viewContactUs()
    { 
      
       return view ('contactUs.contactUs');
      
    }


       public function send(Request $request)
        {
         $this->validate($request, [
          'name'          =>  ['required'],
          'email'         =>  ['required'],
          'contactNumber' =>  ['required'],
          'msgCategory'   =>  ['required'],
          'msgSubject'    =>  ['required'],
          'msgBody'       =>  ['required'],
         ]);
    
            $data = array(
                'name'              =>   $request->name,
                'email'             =>   $request->email,
                'contactNumber'     =>   $request->contactNumber,
                'msgCategory'       =>   $request->msgCategory,
                'msgSubject'        =>   $request->msgSubject,
                'msgBody'           =>   $request->msgBody,
                'msgTicketId'       =>   'SS'.'-'.mt_rand(11111111,99999999),
            );
    
         if ($data)
          {
            $email = $request->email;
            Mail::to('birth.user1@gmail.com')->cc($email)->send(new contactUsMail($data));
            return redirect('/contact-us')->with('message', 'Thank you for contacting with us !');
          }
        } 
    }
