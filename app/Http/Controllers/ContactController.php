<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            $contact = auth()->user()->contact()->create($validated);

            return back()->with('success', 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
