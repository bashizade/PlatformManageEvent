<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Event\EventCreateRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('panel.events',compact('events'));
    }

    public function create(EventCreateRequest $request)
    {
        $validate_data = $request->validated();

        $validate_data['user_id'] = Auth::id();

        Event::query()->create($validate_data);

        $this->show_message('رویداد با موفقیت ایجاد شد');

        return redirect(route('panel.event.index'));

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
