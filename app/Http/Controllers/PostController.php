<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['posts'] = Post::all();
        return view('posts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        echo "<div class='alert alert-success' role='alert'>
                      Sucessfully Saved !!!
                    </div>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $editId = $_POST['edit_id'];
        $post = Post::findOrFail($editId);
        $output = [];
        $output = '<form  method="post" id="form">';
        $output .= '<div id="updatemsg"></div>';
    $output .= '<input type="hidden" name="update_id" id="update_id" value="'.$post->id.'">';
    $output .=  '<div class="form-group">';
        $output .= '<label for="">Title</label>';
        $output .= '<input type="text" value="'.$post->title.'" id="edit_title" class="form-control" name="title">';
    $output .='</div>';
    $output .= '<div class="form-group">';
        $output .= '<label for="">Description</label>';
        $output .= '<textarea name="description" id="edit_description" cols="5" rows="5" class="form-control">'.$post->description.'</textarea>';
    $output .=  '</div>';
    $output .=  '</form>';
    return $output;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update_id = $_POST['update_id'];
        $post = Post::findOrFail($update_id);
        $post->title = $request->edit_title;
        $post->description = $request->edit_description;
        $post->save();
        echo "<div class='alert alert-success' role='alert'>
                      Sucessfully Updated !!!
                    </div>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $ids = $_POST['del_id'];
        $post = Post::findOrFail($ids);
        $post->delete();
        echo "<div class='alert alert-success' role='alert'>
                      Sucessfully Deleted !!!
                    </div>";
    }

    public function getData(){
        $posts = Post::all();
        $output = [];
        $output = "<table class='table table-bordered'>";

        $output .= "<thead>";
        $output .= "<th>Sl.</th>";
        $output .= "<th>Title</th>";
        $output .= "<th>Description</th>";
        $output .= "<th>Action</th>";
        $output .= "</thead>";
        $output .= "<tbody>";
        $inc=0;
        foreach($posts as $post){ 
            $inc++;
            $output .= "<tr>";
            $output .= "<td>".$inc."</td>";
            $output .= "<td>".$post->title."</td>";
            $output .= "<td>".$post->description."</td>";
            $output .= "<td ><a class='btn btn-info btn-sm mx-3' value='".$post->id."' id='edit' data-toggle='modal' data-target='#staticBackdrop'>Edit</a><a class='btn btn-danger btn-sm' id='del' value='".$post->id."'>Delete</a></td>";
            $output .= "</tr>";
        }
        $output .= "</tbody>";
        $output .= "</table>";
        echo $output;

    }
}
