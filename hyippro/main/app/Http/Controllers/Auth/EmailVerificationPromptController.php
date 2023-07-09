<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {

        if (!setting('email_verification', 'permission')) {
            return redirect()->route('user.dashboard');
        }

        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : view('frontend.auth.verify-email');
    }
}
