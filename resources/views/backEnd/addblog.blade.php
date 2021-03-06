@extends('backEnd.master')
@section('title','Add Tours')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Blogs</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Add Blog</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							@include('errors.note')
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Banner Images</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="100px" src="img/new_seo-10-512.png">
									</div>
									<div class="form-group" >
										<label>Mutiple Images</label>
										<input type="file"  multiple="multiple" name="image_list[]" id="image_list" onchange="changeImgs(this)">
										<div class="row" id="show_imgs">
											
										</div>
									</div>
									<div class="form-group" >
										<label>Title</label>
										<input type="text" required class="form-control" name="title">
									</div>
									<div class="form-group" >
										<label>Sumary</label>
										<input required type="text" class="form-control" name="sumary">
									</div>
									<div class="form-group" >
										<label>Content</label>
										<textarea class="ckeditor" name="content"></textarea>
									</div>
									<div class="form-group" >
										<label>Note</label>
										<input type="text" class="form-control" name="note">
									</div>
									<div class="form-group" >
										<label>Status</label><br>
										Active: <input  type="radio" name="status" checked value="1">
										Missed: <input type="radio" name="status" value="0">
									</div>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('description',{
											language:'vi',
											filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>
									<input type="submit" name="submit" value="Save" class="btn btn-primary">
									<a href="{{asset('admin/blog')}}" class="btn btn-danger">Cancell</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop