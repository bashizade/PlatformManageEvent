<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::query()->where('status',1)->get();

        return view('index',compact('events'));
    }
}
