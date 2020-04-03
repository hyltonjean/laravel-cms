<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \App\Setting::create([
      'site_name' => "Laravel's Blog",
      'address' => "1 Business Way, Boston, MA",
      'contact_number' => '8 907 546 5412',
      'contact_email' => 'info@laravel-blog.com'
    ]);
  }
}
