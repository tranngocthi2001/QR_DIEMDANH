<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function showEvents()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }
}
