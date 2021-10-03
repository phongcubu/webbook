<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Mail;
session_start();

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('pages.contact.contacts');
    }

    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin
        Mail::send('pages.contact.contactMail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'messages' => $input['message'],
        ), function($message) use ($request){
        
            $message->from($request->email);
            $message->to('pspbookk@gmail.com', 'BOOK PSP')->subject($request->get('subject'));
        });
        
        Session::put('message', "Phản hồi của bạn đã được gửi, chúng tôi sẽ sớm gửi giải đáp thắc mắc cho bạn ");
        return redirect()->back();
    }
}