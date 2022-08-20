<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function send(Request $request)
    {
        $message = ContactUs::create($request->all());
        return response($message);
    }
}
