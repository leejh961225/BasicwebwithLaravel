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

    public function deleteMessage(Request $request){
        $msgid = $request->input('messageidx');
        Message::find ($msgid)->delete();
        return redirect('/messages')->with('success','Message Deleted');
    }

    public function editMessage(Request $request){

        $this->validate($request, [
            'messageName' => 'required',
            'messageEmail' => 'required'
        ]);
             $msgid = $request->input('messageidx');
             $messagenName = $request->input('messageName');
             $messageEmail = $request->input('messageEmail');

             $MessageUpdate = Message::find($msgid);
             $MessageUpdate->name = $messagenName;
             $MessageUpdate->email = $messageEmail;
             $MessageUpdate->save();
           //->update(['name' => $messagenName, 'email' => $messageEmail]);
           // $task = Message::findorFail($msgid);
           // $input = $request->all();
           // $task->fill($input)->save();

           return redirect('/')->with('success','Message Updated');
    }
}
