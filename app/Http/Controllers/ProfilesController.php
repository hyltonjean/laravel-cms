<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Profiles\UpdateProfilesRequest;

class ProfilesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('users.edit')->with('user', auth()->user());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProfilesRequest $request)
  {
    $user = auth()->user();

    if ($request->hasFile('avatar')) {

      $avatar = $request->avatar;

      $avatar_new_name = time() . $avatar->getClientOriginalName();

      $avatar->move('storage/uploads/avatar', $avatar_new_name);

      $user->profile->avatar = 'storage/uploads/avatar/' . $avatar_new_name;

      $user->profile->save();
    }

    if ($request->has('password')) {
      $user->password = bcrypt($request->password);

      $user->save();
    }

    $user->name = $request->name;
    $user->email = $request->email;

    $user->profile->facebook = $request->facebook;
    $user->profile->twitter = $request->twitter;
    $user->profile->youtube = $request->youtube;
    $user->profile->about = $request->about;

    $user->save();
    $user->profile->save();

    session()->flash('success', 'User profile has been updated successfully.');

    return redirect(route('dashboard'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
