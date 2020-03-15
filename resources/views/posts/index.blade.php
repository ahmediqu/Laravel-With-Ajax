@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
			<div class="row justify-content-center">
				<div class="col-md-8">
					
					<div class="jumbotron">
						<h2>Add Data</h2>
						<form  method="post" id="form">
							@csrf
							<div id="result"></div>
							<div id="show"></div>
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" id="title" class="form-control" name="title">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<i class="spinner fa fa-spinner fa-spin"></i>
								<input type="submit" class="btn btn-info btn-lg prevent_btn" id="save">
							</div>
						</form>
						<br><br>
						<div id="getData"></div>

						{{-- <table class="table table-bordered">
							<thead>
								<th>Sl</th>
								<th>Title</th>
								<th>Description</th>
							</thead>
							<tbody>
								<?php
									$postss = App\Post::all();
								?>
								@foreach($postss as $post)
								<tr>
									<td>{{$post->title}}</td>
								</tr>
								@endforeach
							</tbody>
						</table> --}}
						
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="edit_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update">Update</button>
      </div>
    </div>
  </div>
</div>
@endsection