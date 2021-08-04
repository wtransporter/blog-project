<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $service)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        $service->subscribe(request('email'));

        return redirect('/')->with('success', 'You successfully signed up for our newsletter.');
    }
}
