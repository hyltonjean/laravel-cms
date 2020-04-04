<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Http\Requests\Settings\UpdateSettingsRequest;

class SettingsController extends Controller
{
  public function index()
  {
    return view('settings.settings')->with('settings', Setting::first());
  }

  public function update(UpdateSettingsRequest $request)
  {
    $settings = Setting::first();

    $settings->update([
      'site_name' => $request->site_name,
      'address' => $request->address,
      'contact_number' => $request->contact_number,
      'contact_email' => $request->contact_email,
    ]);

    session()->flash('success', 'Settings updated successfully.');

    return redirect(route('dashboard'));
  }
}
