@extends('layouts.admin')

@section('title', 'Create Category')

@section('breadcrumbs', 'Categories' )

@section('second-breadcrumb')
    <li>Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center"></h3>
                    </div>
                    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="category" class="font-weight-bold">Category Name</label>
                                <input type="text" name="name" placeholder="Category name..." class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name')}}" required>
                                <div class="invalid-feedback"> {{$errors->first('name')}}</div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="font-weight-bold">Category Description</label>
                                <textarea type="text" name="description" placeholder="Category Description..." class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" required>{{old('description')}}</textarea>
                                <div class="invalid-feedback"> {{$errors->first('description')}}</div>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="font-weight-bold">Image</label>
                                <input type="file" name="image" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" required>
                                <div class="invalid-feedback"> {{$errors->first('image')}}</div>
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
