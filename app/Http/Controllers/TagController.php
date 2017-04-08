<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Post;

class TagController extends Controller
{

  public function index(Tag $tag){

    $posts = $tag->posts()->paginate(10);

    return view('posts.index', compact('posts'));

  }

}
