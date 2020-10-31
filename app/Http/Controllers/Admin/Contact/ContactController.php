<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Encryption\DecryptException;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }
    public function show()
    {
        $query = Contact::latest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->editColumn('subject', function ($row) {
                $subject = '<a  href="' . route('admin.subject', ['id' => encrypt($row->id)]) . '" class="btn btn-primary" target="_blank">' . $row->subject . '</a>';
                return $subject;
            })
            ->addColumn('action', function ($row) {
                $action = '<a  href="' . route('admin.delete_contact', ['id' => encrypt($row->id)]) . '" class="btn btn-danger">Delete</a>';
                return $action;
            })
            ->rawColumns(['action', 'subject'])
            ->make(true);
    }

    public function destroyContact($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $contact = Contact::find($id);
        if ($contact->delete()) {
            return redirect()->back()->with('message', 'Contact Deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function subject($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $contact = Contact::find($id);
        return view('admin.contact.subject', compact('contact'));
    }
}
