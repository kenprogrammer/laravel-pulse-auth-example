<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Collection;
use App\Models\User;

class Userscontroller extends Controller
{
    public function index()
    {
        $users = collect();

        \DB::table('users')->orderBy('id')->chunk(100, function ($chunk) use($users){
            $users->push($chunk);
        });

        return response()->json($users);

        //return User::all();
    }
}
