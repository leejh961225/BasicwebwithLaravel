<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    //
    public function submit(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
    ]);
        //create new message
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');

        //save message
        $message->save();

        //redirect
        return redirect('/')->with('success','Message Sent');

    }

    public function getMessages(){
        
        $messages = Message::all();
        return view('layouts.messages')->with('messages', $messages);
    }
    public function deleteMessage(){
        
    }
}
