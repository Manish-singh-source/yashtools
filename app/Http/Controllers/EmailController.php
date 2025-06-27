<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Mail\newsletter;
use App\Mail\contactEmail;
use App\Mail\welcomeemail;
use App\Models\Categories;
use App\Mail\feedbackEmail;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Mail;
use App\Models\Event; // Import the Event model

class EmailController extends Controller
{

    public function contactForm()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::all(); // Retrieve all events
        return view('user.contact', compact('categories', 'brands', 'subcategories', 'events'));
    }
    
    public function sendContactEmail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required|digits:10',
        ]);
        $adminEmail = "sales@yashtools.in";
        $userEmail = $request->email;
        $message = "<p>Thank you for contacting us!</p><p>We have received your message and our team will get back to you as soon as possible. If your inquiry is urgent, feel free to call us directly or reply to this email.</p>";
        $response = Mail::to($adminEmail)->send(new contactEmail($request->all()));
        $userresponse = Mail::to($userEmail)->send(new welcomeemail("Subject", $request->name, $message));

        if ($response) {
            return redirect()->back()->with('success', 'Email has been sent successfully');
        } else {
            return redirect()->back()->with('error', 'Email has not been sent');
        }
    }


    public function feedback()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.feedback', compact('categories', 'brands', 'subcategories', 'events'));
    }

    public function sendFeedbackEmail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required|digits:10',
        ]);
        $adminEmail = "sales@yashtools.in";
        $userEmail = $request->email;
        $message = "<p>We truly appreciate you taking the time to share your feedback with us.</p><p>Your input helps us improve our services and better serve awesome users like you.</p>";
        $response = Mail::to($adminEmail)->send(new feedbackEmail($request->all()));
        $userresponse = Mail::to($userEmail)->send(new welcomeemail("Subject", $request->name, $message));

        if ($response) {
            return redirect()->back()->with('success', 'Email has been sent successfully');
        } else {
            return redirect()->back()->with('error', 'Email has not been sent');
        }
    }

    public function sendNewsletter(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);
        $adminEmail = "sales@yashtools.in";
        $userEmail = $request->email;
        $message = "<p>Thanks for subscribing to our newsletter! We’ll keep you updated with the latest news, tips, and exclusive offers.</p><p>If you ever wish to unsubscribe, you can do so at any time using the link at the bottom of our emails.</p>";
        $response = Mail::to($adminEmail)->send(new newsletter($request->all()));
        Mail::to($userEmail)->send(new welcomeemail("Subject", $request->name, $message));

        if ($response) {
            return redirect()->back()->with('success', 'Email has been sent successfully');
        } else {
            return redirect()->back()->with('error', 'Email has not been sent');
        }
    }
}
