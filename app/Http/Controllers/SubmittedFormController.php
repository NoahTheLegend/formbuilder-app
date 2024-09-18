<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedForms;
use App\Mail\FormSubmitted;
use App\Models\AdminFormElement;
use Illuminate\Support\Facades\Mail;

// to be honest, this was (too) hard for me to find out a correct and working way

// todo: integrate current dynamic builder into submitform table
class SubmittedFormController extends Controller
{
    public function submitForm(Request $request)
    {
        $fields = AdminFormElement::where('is_active', true)->get();
        $rules = [];

        foreach ($fields as $field) {
            if ($field->is_required || $field->validation_rules) {
                $rules[$field->name] = $field->validation_rules ? json_decode($field->validation_rules, true) : ['required'];
            }
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        SubmittedForms::create([
            'element_data' => json_encode($validated),
        ]);

        Mail::to('admin@example.com')->send(new FormSubmitted($validated));

        return redirect()->back()->with('success', 'submitted');
    }
}

