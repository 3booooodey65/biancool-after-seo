<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('website.contact_us');
    }

    public function store(ContactUsRequest $request)
    {
        try {
            $contact = ContactUs::create($request->validated());

            Mail::to(env('CONTACT_EMAIL'))->send(new ContactUsMail($contact));

            return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح، سنتواصل معك قريباً.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إرسال الرسالة، حاول مرة أخرى.');
        }
    }
}
