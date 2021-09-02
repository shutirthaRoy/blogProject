<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class PostsController extends Controller {
    
    public function index() {
        $all_posts = Post::paginate(5);
        return view('posts.allPosts', compact('all_posts'));
    }

    
    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {

        $newImageName = time() . '-' . $request->title . '.' . 
                        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);
        
        /* Post::insert([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newImageName,
        ]); */

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $newImageName;
        $post->save();
        
        return redirect(Route('allPosts'));
    }  

    public function searchDataBase(Request $request) {
        $title = $request->get('title');
        $all_posts = Post::where('title', 'LIKE', '%'. $title . '%')->paginate(1);
        if (count($all_posts) > 0) {
            return view('posts.display', compact('all_posts'));
        } else {
            return Redirect()->back();
        }
    }

    public function preEdit() {
        $all_posts = Post::all();
        return view('posts.preEdit', compact('all_posts'));
    }

    public function edit($id) {
        $single_post = Post::find($id);
        $all_posts = Post::all();
        return view('posts.edit', compact('single_post', 'all_posts'));
    }


    public function update(Request $request, $id) {
        /* $posts = new Post;
        $posts->title = $request->title;
        $posts->content = $request->input('content'); */

        
        $newImageName = time() . '-' . $request->title . '.' . 
                        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        File::delete('images/'.Post::find($id)->image);

        Post::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newImageName,
        ]);

        $all_posts = Post::all();
        return view('posts.preEdit', compact('all_posts'));
    }

    public function delete(Request $request, $id) {
        Post::find($id)->delete();
        return redirect()->route('allPosts');
    }

    
}
