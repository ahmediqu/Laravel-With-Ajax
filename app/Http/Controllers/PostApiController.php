<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostApiController extends Controller
{
    public function index(){
    	return Post::all();
    }

    public function show($id){
    	return Post::findOrFail($id);
    }

    public function store(Request $request){
    	return Post::create($request->all());
    }
    public function update(Request $request,$id){
    	$post = Post::findOrFail($id);
    	$post = Post::update($request->all());
    	return $post;
    }

    public function delete(Request $request,$id){
    	$post = Post::findOrFail($id);
    }
}
