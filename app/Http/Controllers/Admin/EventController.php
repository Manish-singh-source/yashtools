<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function viewEvent()
    {
        return view('admin.add-event');
    }

    public function addEvent(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'eventTitle' => 'required',
            "eventDescription" => "required",
            "eventDate" => "required",
            'eventImage' => 'required|image'
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }


        if (!empty($request->eventImage)) {

            $image = $request->eventImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/events'), $imageName);

            $event = new Event();
            $event->events_title = $request->eventTitle;
            $event->events_description = $request->eventDescription;
            if (!empty($event->eventTag)) {
                $event->events_tag = $request->eventTag;
            }
            $event->events_date = $request->eventDate;
            $event->events_image = $imageName;
            $event->save();
        }

        if ($event) {
            flash()->success('Event Created Successfully.');
            return redirect()->route('admin.table.event');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function viewEventTable()
    {
        $events = Event::get();
        return view('admin.event-table', compact('events'));
    }

    public function deleteEvent(Request $request)
    {
        $event = Event::where('event_slug',$request->event_slug)->first();
        if (!empty($event->events_image)) {
            File::delete(public_path('/uploads/events/' . $event->events_image));
        }
        $event->delete();

        if ($event) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editEvent(String $slug)
    {
        $selectedEvent = Event::where('event_slug',$slug)->first();
        return view('admin.edit-event', compact('selectedEvent'));
    }

    public function updateEvent(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'eventId' => 'required',
            'eventTitle' => 'required',
            "eventDescription" => "required",
            "eventDate" => "required",
            'eventImage' => 'image'
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $event = Event::find($request->eventId);
        $event->events_title = $request->eventTitle;
        $event->events_description = $request->eventDescription;
        if (!empty($event->eventTag)) {
            $event->events_tag = $request->eventTag;
        }
        $event->events_date = $request->eventDate;

        if (!empty($event->events_image)) {
            File::delete(public_path('/uploads/events/' . $event->events_image));
        }
        if (!empty($request->eventImage)) {
            $image = $request->eventImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/events'), $imageName);

            $event->events_image = $imageName;
        }

        $event->save();
        
        return redirect()->route('admin.table.event');
    }
}
