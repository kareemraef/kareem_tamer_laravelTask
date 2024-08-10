<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;

class PostsController extends Controller
{

    //  Fetch All Posts
    public function index()
    {
        return Posts::get();
    }

    //  Fetch a Specific Post
    public function show(Posts $posts)
    {
        return $posts;
    }

    //  Create Post
    public function store(StorePostsRequest $request)
    {
        Posts::create($request->validated());
        return response()->json('Post Added Successfully!');
    }

    //  Update Specific Post
    public function update(UpdatePostsRequest $request, Posts $posts)
    {
        $posts->update($request->validated());
        return $posts;
    }

    //  Remove Specific Post
    public function destroy(Posts $posts)
    {
        $posts->delete();
        return response()->json('Post Deleted Successfully!');
    }

    // Retrieve posts by a specific user ID
    public function showUserPosts($userID)
    {
        $post = Posts::where('post_owner_id', $userID)->get();
        return $post;
    }
    
}
