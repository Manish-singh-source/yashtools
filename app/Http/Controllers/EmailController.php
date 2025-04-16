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
        $adminEmail = "pradnya@technofra.com";
        $userEmail = $request->email;
        
        $response = Mail::to($adminEmail)->send(new contactEmail($request->all()));
        $userresponse = Mail::to($userEmail)->send(new welcomeemail("Subject", $request->name));

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
        $adminEmail = "pradnya@technofra.com";
        $userEmail = $request->email;
        $response = Mail::to($adminEmail)->send(new feedbackEmail($request->all()));
        $userresponse = Mail::to($userEmail)->send(new welcomeemail("Subject", $request->name));

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
        $adminEmail = "pradnya@technofra.com";
        $userEmail = $request->email;
        $response = Mail::to($adminEmail)->send(new newsletter($request->all()));
        Mail::to($userEmail)->send(new welcomeemail("Subject", $request->name));

        if ($response) {
            return redirect()->back()->with('success', 'Email has been sent successfully');
        } else {
            return redirect()->back()->with('error', 'Email has not been sent');
        }
    }
}
