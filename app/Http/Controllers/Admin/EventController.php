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
        $validations = Validator::make(
            $request->all(),
            [
                'eventTitle' => 'required|min:3|max:255',
                "eventDescription" => "required",
                "eventDate" => "required",
                'eventImage' => [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg,webp',
                    'max:3072', // 3MB
                    'dimensions:min_width=300,min_height=280,max_width=300,max_height=280'
                ],
            ],
            [
                'eventTitle.required' => 'Event title is required.',
                'eventTitle.min' => 'Event title must be at least 3 characters.',
                'eventDescription.required' => 'Event description is required.',
                'eventDate.required' => 'Event date is required.',
                'eventImage.required' => 'Event image is required.',
                'eventImage.dimensions' => 'Image must be exactly 300x280 pixels.',
                'eventImage.max' => 'Image size cannot exceed 3MB.',
            ]
        );

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
            if (!empty($request->eventTag)) {
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
        $event = Event::where('event_slug', $request->event_slug)->first();
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
        $selectedEvent = Event::where('event_slug', $slug)->first();
        return view('admin.edit-event', compact('selectedEvent'));
    }

    public function updateEvent(Request $request)
    {
        $validations = Validator::make(
            $request->all(),
            [
                'eventId' => 'required',
                'eventTitle' => 'required|string|min:3|max:255',
                'eventDescription' => 'required|string|max:2000',
                "eventDate" => "required",
                'eventImage' => [
                    'nullable',
                    'image',
                    'mimes:jpeg,png,jpg,webp',
                    'max:3072', // 3MB
                    'dimensions:min_width=300,min_height=280,max_width=300,max_height=280'
                ],
            ],
            [
                'eventId.required' => 'Event ID is required.',
                'eventTitle.required' => 'Event title is required.',
                'eventDescription.required' => 'Event description is required.',
                'eventDate.required' => 'Event date is required.',
                'eventImage.dimensions' => 'Image must be exactly 300x280 pixels.',
                'eventImage.max' => 'Image size cannot exceed 3MB.',
            ]
        );

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $event = Event::find($request->eventId);
        $event->events_title = $request->eventTitle;
        $event->events_description = $request->eventDescription;
        if (!empty($request->eventTag)) {
            $event->events_tag = $request->eventTag;
        }
        if (!empty($request->eventDate)) {
            $event->events_date = $request->eventDate;
        }
        if (!empty($request->eventImage)) {
            if (!empty($event->events_image)) {
                File::delete(public_path('/uploads/events/' . $event->events_image));
            }
            $image = $request->eventImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/events'), $imageName);

            $event->events_image = $imageName;
        }

        $event->save();

        return redirect()->route('admin.table.event');
    }
}
