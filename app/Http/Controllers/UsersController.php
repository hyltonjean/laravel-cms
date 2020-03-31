<?php

namespace App\Http\Controllers;

use App\User;
// use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateUsersProfile;

class UsersController extends Controller
{
  public function index()
  {
    return view('users.index')->with('users', User::all());
  }

  public function edit()
  {
    return view('users.edit')->with('user', auth()->user());
  }

  public function update(UpdateUsersProfile $request)
  {
    $user = auth()->user();

    $user->update([
      'name' => $request->name,
      'about' => $request->about
    ]);

    session()->flash('success', 'User profile has been updated successfully.');

    return redirect(route('users.index'));
  }

  public function make_admin(User $user)
  {
    $user->role = 'admin';

    $user->save();

    session()->flash('success', 'User made an administrator successfully.');

    return redirect(route('users.index'));
  }
}
