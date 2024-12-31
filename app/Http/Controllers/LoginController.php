<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email_log'    => 'required|email',
            'password_log' => 'required|string|min:6',
        ]);

        // Check client table
        $user = DB::table('clients')->where('email', $request->email_log)->first();

        // Authenticate Client
        if ($user && $user->password === $request->password_log) {
            session(key: ['user_id' => $user->client_id]);
            session(key: ['user_name' => $user->name]);
            $clients=Client::all();
            // return $clients;
            return redirect()->route('dashboard',compact('clients'));
        }

        // Authentication Failed
        // return redirect('')->(['email' => 'Invalid credentials. Please try again.']);
        return redirect()->route('login')->with('error','Invalid credentials. Please try again.');
    }
}
