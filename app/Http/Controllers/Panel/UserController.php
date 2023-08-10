<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('status',1)->where('id','!=',Auth::id())->get();

        return view('panel.users',compact('users'));
    }

    public function to_admin(Request $request, User $user)
    {
        $user->update([
            'is_admin' => 1
        ]);

        $this->show_message('دسترسی ادمین با موفقیت اعطا شد');

        return redirect(route('panel.user.index'));
    }

    public function to_agent(Request $request, User $user)
    {
        $user->update([
            'is_agent' => 1
        ]);

        $this->show_message('دسترسی برگزار کننده با موفقیت اعطا شد');

        return redirect(route('panel.user.index'));
    }
}
