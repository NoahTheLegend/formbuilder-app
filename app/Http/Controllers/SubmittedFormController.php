<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedForms;
use App\Mail\FormSubmitted;
use App\Models\AdminFormElement;
use Illuminate\Support\Facades\Mail;

// to be honest, this was (too) hard for me to find out a correct and working way

class SubmittedFormController extends Controller
{
    public function showForm()
    {
        $fields = AdminFormElement::where('element_data->is_active', true)->get();
        $formContent = view('admin-form-elements', compact('fields'))->render();

        return view('main', compact('formContent'));
    }

    public function submitForm(Request $request)
    {
        $fields = AdminFormElement::where('is_active', true)->get();
        $rules = [];

        foreach ($fields as $field) {
            if ($field->is_required || $field->validation_regex) {
                $rules[$field->name] = $field->validation_regex ? json_decode($field->validation_regex, true) : ['required'];
            }
        }

        $validated = $request->validate($rules);

        SubmittedForms::create([
            'element_data' => json_encode($validated),
        ]);

        Mail::to('admin@example.com')->send(new FormSubmitted($validated));

        return redirect()->back()->with('success', 'submitted');
    }
}

