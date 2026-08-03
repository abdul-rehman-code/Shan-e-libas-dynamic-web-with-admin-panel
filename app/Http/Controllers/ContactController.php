<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

   public function submit(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email',
        'subject'    => 'required|string|max:255',
        'message'    => 'required|string',
    ]);

    $data = $request->all();
    $fullName = $data['first_name'] . ' ' . $data['last_name'];

    // Send Mail Logic
    Mail::send([], [], function ($message) use ($data, $fullName) {
        $message->to('whyimrperfect@gmail.com') 
                ->subject('New Inquiry: ' . $data['subject'])
                ->replyTo($data['email'], $fullName)
                ->html("
                    <h3>New Contact Form Message</h3>
                    <p><strong>Name:</strong> {$fullName}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Subject:</strong> {$data['subject']}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$data['message']}</p>
                ");
    });

   return response()->json([
        'status' => 'success',
        'message' => 'Thank you! Your message has been sent successfully.'
    ]);
}

}