<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function forgot()
    {
        return view ('auth.passwords.reset');
    }
}
