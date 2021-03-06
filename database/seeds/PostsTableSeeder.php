<?php

use App\Tag;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $cat1 = Category::create([
      'name' => 'marketing',
      'slug' => 'marketing',
    ]);
    $cat2 = Category::create([
      'name' => 'partnership',
      'slug' => 'partnership',
    ]);
    $cat3 = Category::create([
      'name' => 'news',
      'slug' => 'news',
    ]);

    $author1 = User::create([
      'name' => 'John Doe',
      'email' => 'john@doe.com',
      'password' => Hash::make('password')
    ]);

    $author2 = User::create([
      'name' => 'Jane Doe',
      'email' => 'jane@doe.com',
      'password' => Hash::make('password')
    ]);

    $post1 = $author1->posts()->create([
      'title' => 'We relocated our office to a new designed garage',
      'slug' => 'we-relocated-our-office-to-a-new-designed-garage',
      'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      'content' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
      'image' => 'posts/1.jpg',
      'category_id' => $cat1->id,
      'published_at' => now(),
    ]);

    $post2 = $author2->posts()->create([
      'title' => 'Top 5 brilliant content marketing strategies',
      'slug' => 'top-5-brilliant-content-marketing-strategies',
      'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      'content' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
      'image' => 'posts/2.jpg',
      'category_id' => $cat2->id,
      'published_at' => now(),
    ]);

    $post3 = $author1->posts()->create([
      'title' => 'Best practices for minimalist design with example',
      'slug' => 'best-practices-for-minimalist-design-with-example',
      'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      'content' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
      'image' => 'posts/3.jpg',
      'category_id' => $cat3->id,
      'published_at' => now(),
    ]);

    $post4 = $author2->posts()->create([
      'title' => 'Congratulate and thank to Maryam for joining our team',
      'slug' => 'congratulate-and-thank-to-maryam-for-joining-our-team',
      'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      'content' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
      'image' => 'posts/4.jpg',
      'category_id' => $cat2->id,
      'published_at' => now(),
    ]);

    $author1->profile()->create([
      'user_id' => $author1->id,
      'avatar' => 'storage/uploads/avatar/blank-avatar.jpg',
    ]);

    $author2->profile()->create([
      'user_id' => $author2->id,
      'avatar' => 'storage/uploads/avatar/blank-avatar.jpg',
    ]);

    $tag1 = Tag::create([
      'name' => 'job',
      'slug' => 'job',
    ]);

    $tag2 = Tag::create([
      'name' => 'customers',
      'slug' => 'customers',
    ]);

    $tag3 = Tag::create([
      'name' => 'record',
      'slug' => 'record',
    ]);

    $post1->tags()->attach([$tag1->id, $tag3->id]);
    $post2->tags()->attach([$tag2->id, $tag3->id]);
    $post3->tags()->attach([$tag1->id, $tag2->id]);
  }
}
