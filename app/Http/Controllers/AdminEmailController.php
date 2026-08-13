<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminEmailController extends Controller
{
    public function create()
    {
        $users = User::all();

        return view('admin.email', ['users' => $users]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $destinatario = User::findOrFail($request->user_id);

        Mail::to($destinatario->email)->send(new AdminEmail($request->subject, $request->body));

        return redirect()->route('admin.email.create')->with('status', 'E-mail enviado com sucesso!');
    }
}