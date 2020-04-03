<?php

namespace App\Http\Controllers;

use App\User;
// use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\UpdateUsersProfile;

class UsersController extends Controller
{
  public function index()
  {
    return view('users.index')->with('users', User::all());
  }

  public function create()
  {
    // return view('users.create');
  }

  public function store(UpdateUsersProfile $request)
  {
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'about' => $request->about,
      'password' => Hash::make('password'),
    ]);

    $profile = Profile::create([
      'user_id' => $user->id
    ]);

    session()->flash('success', 'User profile has been created successfully.');

    return redirect(route('users.index'));
  }

  public function make_admin(User $user)
  {
    $user->role = 'admin';

    $user->save();

    session()->flash('success', 'User made an administrator successfully.');

    return redirect(route('users.index'));
  }

  public function remove_admin(User $user)
  {
    $user->role = 'writer';

    $user->save();

    session()->flash('success', 'Users admin permissions removed successfully.');

    return redirect(route('users.index'));
  }
}
