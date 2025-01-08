<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('front.pages.contact');
    }

    public function submitForm(Request $request)
    {
		
		
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save contact data to the database
        Contact::create($validated);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

