<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Post;

use Carbon\Carbon;



class PostController extends Controller
{
  public function __construct()
  {

    $this->middleware('auth')->except(['index', 'show']);

  }


  public function index()
  {

    $posts = Post::latest()
      //->filter(request(['month', 'year']))
      // ->paginate(10);
      ->get();

    return view('posts.index', compact('posts'));

  }


  public function show(Post $post)
  {

    return view('posts.show', compact('post'));

  }


  public function create()
  {

    return view('posts.create');
  }


  public function store(Request $request)
  {

    $title = $request->input('title');
    $body = $request->input('body');
    $user = $request->user();

    $post = new Post;

    $post->title = $title;
    $post->body = $body;
    $post->user_id = $user->id;

    $post->save();

    /*
    $this->validate(request(),[
      'title' => 'required',
      'body' => 'required'
    ]);

    auth()->user()->publish(

      new Post(request(['title', 'body']))

    );
    */

    session()->flash('message', 'Postauksesi on julkaistu.');


    return redirect('/');

    /* tai */

    //return redirect('/')->with('message', 'Your post has now been published.');

  }


  public function edit($id){

    $post = Post::find($id);

    return view('posts.edit')->with('post', $post);

  }


  public function update(Request $request){

    //dd(\App\User::find(auth()->id())->posts());

    $title = $request->input('title');
    $body = $request->input('body');
    $id = $request->input('id');
    $user = $request->user();

    $post = new Post;

    $post->title = $title;
    $post->body = $body;
    $post->user_id = $user->id;
    $post->id = $id;

    Post::where('id', $id)
      ->update(['body' => $body]);

    Post::where('id', $id)
      ->update(['title' => $title]);


    session()->flash('message', 'Postauksesi on päivitetty.');
    return redirect('/');

  }


  public function destroy($id){

    // delete
      $post = Post::find($id);
      $post->delete();

      // redirect
      session()->flash('message', 'Julkaisu poistettu!');
      return redirect('/');

  }

}
