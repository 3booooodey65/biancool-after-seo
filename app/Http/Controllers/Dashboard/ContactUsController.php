<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $contacts = ContactUs::orderByDesc('id')->filter($request->all())->paginate();
        return view('dashboard.contact_us.index', compact('contacts'));
    }

    public function show(ContactUs $contact_u)
    {
        return view('dashboard.contact_us.show', compact('contact_u'));
    }

    public function toggleRead(ContactUs $contactUs)
    {
        $contactUs->is_read = !$contactUs->is_read;
        $contactUs->save();

        return redirect()->back()->with('success', 'تم تحديث حالة الرسالة.');
    }
}
