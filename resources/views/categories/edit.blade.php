@extends('layouts.admin')

@section('title', 'Edit Category')

@section('breadcrumbs', 'Categories' )

@section('second-breadcrumb')
	<li>Edit</li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
						<div class="col-12 mb-3">
							<h3 align="center"></h3>
						</div>
						<form action="{{route('categories.update', [$category->id])}}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_method" value="PUT">
							<div class="col-10">
								<div class="mb-3">
									<label for="category" class="font-weight-bold">Category Name</label>
									<input type="text" name="name" placeholder="Category name..." class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{$category->name}}" required>
									<div class="invalid-feedback"> {{$errors->first('name')}}</div>
								</div>
								<div class="mb-3">
									<label for="slug" class="font-weight-bold">Category Slug</label>
									<input type="text" name="slug" placeholder="Category Slug..." class="form-control {{$errors->first('slug') ? "is-invalid" : ""}}" value="{{$category->slug}}">
									<div class="invalid-feedback"> {{$errors->first('slug')}}</div>
								</div>
								<div class="mb-3">
									<label for="description" class="font-weight-bold">Category Description</label>
									<textarea type="text" name="description" placeholder="Category Description..." class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" value="">{{$category->description}}</textarea>
									<div class="invalid-feedback"> {{$errors->first('description')}}</div>
								</div>
								<div class="mb-3">
									<label for="image" class="font-weight-bold d-flex">Image</label>
									@if($category->image)
										{{-- <img src="{{asset('storage/'.$category->image)}}" alt="image" width="120"> --}}
										<img src="{{asset('category_image/'.$category->image)}}" alt="" width="120px">
									@else   
										No Image
									@endif
									<input type="file" name="image" class="form-control mt-2" >
									<small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
								</div>
								<div class="mb-3 mt-4">
									<a href="{{route('categories.index')}}" class="btn btn-md btn-secondary">Back</a>
									<button type="submit" class="btn btn-md btn-success">Save</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
@endsection
