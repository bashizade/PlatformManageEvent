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

        if ($user->events->where('event_id',$event->id)->count() == 0){
            $user->events()->create([
                'event_id' => $event->id
            ]);
        }else{
            $this->show_message('شما یک بار در این رویداد ثبت نام کرده اید');
            return redirect(route('index'));
        }


        $this->show_message('با موفقیت در رویداد ثبت نام شدید');

        return redirect(route('index'));
    }
}
