<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class ApiController extends Controller
{
    public function getAllPosts() {
        $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        return response($posts, 200);        
    
    }

    public function createPost(Request $request) {
        $posts = Post::create($request->all());
        return response()->json(["message" => "Post Created successfully"], 201);
    }

    public function getPost($id) {
        if(Post::where('id',$id)->exists()){
            $posts = Post::where('id', $id)->get(); 
            return response($posts, 200);
        }else{
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
    }

    public function updatePost(Request $request, $id) {
        if (Post::where('id', $id)->exists()) {
            $post = Post::find($id);
            $post->postTitle = is_null($request->postTitle) ? $post->postTitle : $request->postTitle;
            $post->post = is_null($request->post) ? $post->post : $request->post;
            $post->postImage = is_null($request->postImage) ? $post->postImage : $request->postImage;
            $post->user_id = is_null($request->user_id) ? $post->user_id : $request->user_id;
            $post->update();

            return response()->json([
                "message" => "records updated successfully",
                "data" => $post->save()
            ], 200);
        } else {
            return response()->json([
                "message" => "Post not found"
            ], 404);
            
        }
    }

    public function deletePost($id) {
        $post = Post::findOrFail($id);
        
        $post->delete();
        
        return response()->json([
            "message" => "post record deleted"
        ], 201);
    }
}
