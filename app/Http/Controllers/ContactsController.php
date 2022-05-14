<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Validation\ValidationException;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('feedback.index', compact('contacts'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        $this->validate(request(), [
            'email' => 'required',
            'message' => 'required'
        ]);

        Contact::create(request()->all());

        return redirect('/admin/feedback');
    }
}
