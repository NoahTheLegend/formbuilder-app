<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedForms;

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

        SubmittedForms::create($validated);
        return redirect()->back()->with('success', 'submitted');
    }
}
