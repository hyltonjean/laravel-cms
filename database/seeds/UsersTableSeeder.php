<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // $user = User::where('email', 'hyltonjean@gmail.com')->first();

    if (!auth()->user()) {
      $user = User::create([
        'name' => 'Hylton Walters',
        'email' => 'hyltonjean@gmail.com',
        'role' => 'admin',
        'password' => bcrypt('password')
      ]);
    }

    Profile::create([
      'user_id' => $user->id,
      'avatar' => 'storage/uploads/avatar/blank-avatar.jpg',
      'about' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non totam omnis, commodi expedita ea assumenda consequatur, mollitia, enim magnam harum eos sint numquam magni quos ut ipsum ad quam voluptate ipsam deserunt dolorem cum! Quod possimus itaque officiis vel dignissimos a perspiciatis sint nihil, molestiae earum excepturi officia eius eveniet!',
      'facebook' => 'http://facebook.com',
      'twitter' => 'http://twitter.com',
      'youtube' => 'http://youtube.com',
    ]);
  }
}
