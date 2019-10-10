<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ContactUS;

class ContactController extends Controller
{
    public function contactUS()
   {
       return view('contactus.create');
   }

   public function contactSaveData(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
        'subject' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);
      ContactUS::create($request->all()); 
    \Mail::send('contactus.contactus',
       array(
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'subject' => $request->get('subject'),
           'user_message' => $request->get('message')
       ), function($message) use ($request)
   {
      $message->from('collegeconnection2019@gmail.com');
      $message->to('hrp1501998@gmail.com', 'Admin')->subject($request->get('subject'));
   });
    return back()->with('success', 'Thanks for contacting us!'); 
   }

}
