<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedForms;
use App\Mail\FormSubmitted;
use Illuminate\Support\Facades\Mail;
class SubmittedFormController extends Controller
{
    public function submitForm(Request $request)
    {
        $validated = $request->validate([ // validate via requirements
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'photo' => 'required|image|max:2048',
            'comment' => 'nullable|string',
        ]);

        //
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }
        
        /*Mail::raw('amogus', function ($message) {
            $message->to('admin@example.com')
                    ->subject('test');
        });*/
        Mail::to('admin@example.com')->send(new FormSubmitted($validated));

        SubmittedForms::create($validated);
        return redirect()->back()->with('success', 'submitted');
    }
}
