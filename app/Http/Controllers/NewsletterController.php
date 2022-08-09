<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller
{

    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);
        try {
            $result = $newsletter->subscribe(request('email'));
            return redirect('/')->with('success', request('email') . ' is now signed up for our newsletter!');
        } catch (Exception $e) {
            throw ValidationException::withMessages(['Invalid email!']);
        }
    }
}
