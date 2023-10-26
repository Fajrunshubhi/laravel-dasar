<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put("userId", "Fajrun");
        $request->session()->put("isMember", true);
        return 'OK';
    }

    public function getSession(Request $request): string
    {
        $user = $request->session()->get("userId");
        $member = $request->session()->get("isMember");

        return "Heloo user $user, is member $member";
    }
}
