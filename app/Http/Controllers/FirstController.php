<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\structure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FirstController extends Controller
{
    public function firstadmin(UserRequest $request)
    {
        $user = User::create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'Admin' => 1,
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'struct_id' => 1,
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
