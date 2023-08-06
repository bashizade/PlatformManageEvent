<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Event\EventCreateRequest;
use App\Http\Requests\Panel\Event\EventDeleteRequest;
use App\Http\Requests\Panel\Event\EventUpdateRequest;
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

        $event = Event::query()->create($validate_data);

        foreach ($request->categories as $category){
            $event->category()->create([
                'category_id' => $category
            ]);
        }

        $this->show_message('رویداد با موفقیت ایجاد شد');

        return redirect(route('panel.event.index'));

    }

    public function update(EventUpdateRequest $request,Event $event)
    {
        if ($event->user_id != Auth::id())
            abort(403,'شما اجازه دسترسی به این محتوا را ندارید');

        $validate_data = $request->validated();

        $event->update($validate_data);

        $event->category()->delete();
        foreach ($request->categories as $category){
            $event->category()->create([
                'category_id' => $category
            ]);
        }

        $this->show_message('رویداد با موفقیت ویرایش شد');

        return redirect(route('panel.event.index'));
    }

    public function disable(EventDeleteRequest $request,Event $event)
    {
        $validate_data = $request->validated();
        $event->update($validate_data);

        $this->show_message('رویداد با موفقیت غیرفعال شد');

        return redirect(route('panel.event.index'));
    }

    public function enable(EventDeleteRequest $request,Event $event)
    {
        $validate_data = $request->validated();
        $event->update($validate_data);

        $this->show_message('رویداد با موفقیت فعال شد');

        return redirect(route('panel.event.index'));
    }

}
