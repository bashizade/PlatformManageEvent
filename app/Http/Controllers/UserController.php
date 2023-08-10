<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register_to_event(Event $event)
    {
        $user = User::find(Auth::id());
        $user->events()->create([
            'event_id' => $event->id
        ]);

        $this->show_message('با موفقیت در رویداد ثبت نام شدید');

        return redirect(route('index'));
    }
}
