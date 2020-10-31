<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $courses = Course::whereStatus(1)->latest()->get();
        return view('web.index', compact('courses'));
    }

    public function gallery()
    {
        $galleries = Gallery::whereStatus(1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('web.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function storeContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');

        if ($contact->save()) {
            return redirect()->back()->with('message', 'Thank you for contacting us! We will contact you soon!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
