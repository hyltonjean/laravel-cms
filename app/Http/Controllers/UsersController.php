<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Http\Requests\Users\CreateUsersProfile;

class UsersController extends Controller
{
  public function index()
  {
    return view('users.index')->with('users', User::all());
  }

  public function create()
  {
    return view('users.create')->with('user', auth()->user());
  }


  public function store(CreateUsersProfile $request)
  {

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt('password')
    ]);

    $profile = Profile::create([
      'user_id' => $user->id,
      'avatar' => 'storage/uploads/avatar/blank-avatar.jpg',
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
    $user->role = 'author';

    $user->save();

    session()->flash('success', 'Users admin permissions removed successfully.');

    return redirect(route('users.index'));
  }

  public function remove_user(User $user)
  {
    $user->delete();

    session()->flash('success', 'Users deleted successfully.');

    return redirect(route('users.index'));
  }
}
