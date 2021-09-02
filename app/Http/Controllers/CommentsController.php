<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller {
    
    public function showAllComments() {
        $all_posts = Post::all();

        return view('posts.allComments', compact('all_posts'));
    }

    public function storeComments(Request $request, $id) {
        Post::find($id);
        $post = Post::find($id); 
        $comment = new Comment();
        $comment->username = $request->username;
        $comment->comment = $request->comment;
        $post->comments()->save($comment);

        return redirect('/posts/'.$id);
    }

    public function deleteComments(Request $request, $id) {
        Comment::find($id)->delete();
        return Redirect()->back();
    }
}
