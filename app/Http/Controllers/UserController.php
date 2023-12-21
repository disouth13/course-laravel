<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        // echo "<pre>";
        // print_r($user);

        foreach ($user as $item) {
            # code...
            echo $item->nama;
            echo "<br>";
            echo $item->email;
            echo "<br>";
            echo $item->phone->phone;
            foreach ($item->roles()->get() as $itemroles) {
                # code...
                echo $itemroles->name;
            }

        }
    }
}
