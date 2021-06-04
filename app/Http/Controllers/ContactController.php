<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contact_index()
    {
        return view('pages.contact');
    }
    public function message_save(Request $request)
    {
        $request->validate($this->validateArray());

        $message          = new message;
        $message->name    = $request->name;
        $message->email   = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect(route('Contactus'))->withMessage('Message sent success');

    }

    private function validateArray()
    {
        return [
            'name'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',

        ];
    }
    public function show_message(){
        $messageall = message::latest()->get();
        return view('admin.message.message',compact('messageall'));
    }
}
