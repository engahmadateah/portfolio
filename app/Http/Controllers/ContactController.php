<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // عند فشل التحقق: Laravel يرجّع تلقائياً JSON بكود 422 لطلبات الـ AJAX
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        try {
            Message::create($validated);
        } catch (\Throwable $e) {
            report($e);

            $error = __('Something went wrong on our side. Please try again in a moment.');

            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $error], 500);
            }

            return redirect(url('/') . '#contact')->withInput()->with('error', $error);
        }

        $success = __('Your message has been sent successfully');

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => $success]);
        }

        return redirect(url('/') . '#contact')->with('success', $success);
    }
}
