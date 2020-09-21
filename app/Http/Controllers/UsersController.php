<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::role('Administrator')->get();

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(UserRequest $request)
    {
        $password = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
        ]);

        $user->assignRole('Administrator');

        Mail::to($user->email)->send(new WelcomeMail($user, $password));

        return redirect()->back()->with('success', 'A new administrator has been created');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('pages.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->update($request->all());

        return redirect()->back()->with('success', 'Your profile has been updated');
    }

    public function edit_password()
    {
        return view('pages.users.password-edit');
    }

    public function update_password(PasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (Hash::check($request->old_password, $user->password))
        {
            $user->update([
                'password' => bcrypt($request->password)
            ]);

            return redirect()->back()->with('success', 'Your password has been updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Your old password is incorrect');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'A user has been deleted');
    }
}
