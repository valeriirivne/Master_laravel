<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // private $posts = [
    //     1 => [
    //         'title' => 'Intro to Laravel',
    //         'content' => 'This is a short intro to Laravel',
    //         'is_new' => true,
    //         'has_comments' => true
    //     ],
    //     2 => [
    //         'title' => 'Intro to PHP',
    //         'content' => 'This is a short intro to PHP',
    //         'is_new' => false
    //     ],
    //     3 => [
    //         'title' => 'Intro to Golang',
    //         'content' => 'This is a short intro to Golang',
    //         'is_new' => false
    //     ]
    // ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts' => BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        // $post = new BlogPost();
        // $post->title = $validated['title'];
        // $post->content = $validated['content'];
        // $post->save();

        $post = BlogPost::create($validated);

        $request->session()->flash('status', 'The blog post was created');


        return redirect()->route('posts.show', ['post' => $post->id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);

        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'Blog post was updated!');

        return redirect()->route('posts.show', ['post' => $post->id]);
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




// In Laravel, a model is a representation of a database table, and an instance of a model represents a single record in that table. When you create a new instance of a model, you're essentially creating a new object that corresponds to a row in the database table. This object allows you to interact with the database record using object-oriented syntax.

// Let's say you have a BlogPost model that represents a blog post in a blog_posts table. Here's how you can create new instances of the BlogPost model:

// php
// Copy code
// use App\Models\BlogPost;

// // Creating a new instance using the make() method
// $newPost = BlogPost::make([
//     'title' => 'New Post Title',
//     'content' => 'This is the content of the new post.'
// ]);

// // Creating a new instance using the create() method
// $newPost = BlogPost::create([
//     'title' => 'New Post Title',
//     'content' => 'This is the content of the new post.'
// ]);
// In both cases, you're creating a new instance of the BlogPost model with the provided data. The make() method creates the instance without saving it to the database, while the create() method creates the instance and immediately saves it to the database.

// After creating the instance, you can manipulate its attributes and then decide whether to save it to the database or not. For example:

// php
// Copy code
// $newPost->author_id = 1;
// $newPost->save(); // This will save the instance to the database
// Creating instances of models is a fundamental concept in Laravel's Eloquent ORM, allowing you to work with database records as objects and providing a convenient and intuitive way to interact with your data.