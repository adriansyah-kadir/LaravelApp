<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  public function index(User $boo, Request $request)
  {
    if ($request->has("query")) {
      $posts = Post::where(
        "title",
        "like",
        "%" . $request->input("query") . "%"
      )
        ->orWhere("body", "like", "%" . $request->input("query") . "%")
        ->paginate(7);
    } else {
      $posts = Post::paginate(7);
    }
    if (count($posts)) {
      $posts->withPath("/posts");
    } else {
      $posts = [];
    }
    return view("posts.index", [
      "posts" => $posts,
    ]);
  }

  public function detail(Post $post)
  {
    return view("posts.detail", [
      "post" => $post,
    ]);
  }
  public function new(Request $request)
  {
    return view("posts.new", [
      "categories" => Category::all()->pluck("name"),
    ]);
  }

  public function handleNew(Request $request)
  {
    if ($id = $request->input("id")) {
      $titleValidate = "required";
      $post = Post::find($id);
    } else {
      $titleValidate = "required|unique:App\Models\Post,title";
    }
    $request->validate([
      "title" => $titleValidate,
      "category" => "required",
      "body" => "required",
      "img" => "image",
    ]);

    if ($request->category) {
      if (
        ($category = Category::where("name", "=", $request->category))->exists()
      ) {
        $category = $category->get()[0];
      } else {
        $category = Category::create([
          "name" => $request->category,
          "slug" => Str::slug($request->category),
        ]);
      }
    }
    $img = null;
    if ($file = $request->file("img")) {
      $file->store("public/images");
      $img = "storage/images/" . $file->hashName();
    }

    if ($id and $post) {
      $post->update([
        "title" => $request->title,
        "slug" => Str::slug($request->title),
        "excerpt" => Str::words($request->body, 10),
        "category_id" => $category->id,
        "img" => $img ?? $post->img,
        "body" => $request->body,
      ]);

      return redirect("/posts/{$post->slug}");
    }

    Post::create([
      "title" => $request->title,
      "user_id" => Auth::id(),
      "category_id" => $category->id,
      "slug" => Str::slug($request->title),
      "excerpt" => Str::words($request->body, "10"),
      "img" => $img,
      "body" => $request->body,
    ]);
    return redirect("/posts");
  }

  public function edit(Post $post)
  {
    if ($post->user_id !== Auth::id()) {
      return redirect("/posts/{$post->slug}");
    }

    return view("posts.new", [
      "categories" => Category::pluck("name"),
      "post" => $post,
    ]);
  }

  public function delete(Post $post)
  {
    if (Auth::id() == $post->user_id) {
      $post->delete();
    } else {
      return abort(404);
    }
    return redirect("/posts");
  }
}
