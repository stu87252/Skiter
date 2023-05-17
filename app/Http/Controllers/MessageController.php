<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view("home", [
            "messages" => $messages
        ]);
    }

    public function store(Request $request)
    {
        $parameters = $request->validate([
            'titel' => 'required|max:50|min:1',
            'text' => 'required|max:12000|min:1',

        ]);

        $data = Message::create([
            'titel' => $parameters['titel'],
            'text' => $parameters['text']
        ]);

        return redirect()->route('message.home');
    }

    public function create(){
        return view("crud");
    }

    public function edit($id){
        $message = Message::findOrFail($id);
        return view('update', ['message'=>$message]);
    }

    public function update( Request $request, Message $message){

        $request->validate([
            'titel' => 'required|max:50|min:1',
            'text' => 'required|max:12000|min:1',

        ]);

        $message->update($request->all());

        return redirect()->route('message.home')
            ->with('success','Product updated successfully');


    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('message.home')
            ->with('success','Product deleted successfully');
    }

}