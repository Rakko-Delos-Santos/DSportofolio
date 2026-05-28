<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use App\Mail\ContactReply;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Send contact message
     */
    public function send(ContactRequest $request)
    {
        try {
            $validated = $request->validated();
            
            $name = $validated['name'];
            $email = $validated['email'];
            $message = $validated['message'];

            // Admin notification email
            $adminBody = "New Contact Form Submission\n"
                . "================================\n\n"
                . "From: {$name}\n"
                . "Email: {$email}\n\n"
                . "Message:\n"
                . "{$message}";

            Mail::raw($adminBody, function ($message) use ($name) {
                $message->to('rakodsantos05@gmail.com')
                    ->subject('New Portfolio Contact: ' . $name);
            });

            // Visitor reply email with professional HTML template
            Mail::to($email)->send(new ContactReply($name));

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully! Check your email for confirmation.',
            ]);
        } catch (\Exception $e) {
            \Log::error('Contact Form Error: ' . $e->getMessage());

            return response()->json([
                'success' => true,
                'message' => 'Your message has been received! We will get back to you shortly.',
            ]);
        }
    }
}
