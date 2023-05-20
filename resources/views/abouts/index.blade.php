@extends('layouts.admin')

@section('title', 'About')

@section('breadcrumbs', 'About')

@section('second-breadcrumb')
    <li> Overview About</li>
@endsection

@section('content')
  <!-- table  -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
              
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
            @endif
            
            <h3 class="text-center mt-3 mb-5">View About</h3>
            
            <div class="row">
              <div class="col-3">
                <div class="card shadow" >
                  <img src="{{asset('about_image/'.$abouts[0]->image)}}" class="card-img-top" alt="image">
                </div>
              </div>
              <div class="col-9">
                <p class="font-weight-bold">Caption:</p>
                <p> {!!$abouts[0]->caption!!} </p>
                <a href="{{route('abouts.edit', [$abouts[0]->id])}}" class="btn btn-warning text-light"><i class="fa fa-pencil"></i> Edit Profile</a>
              </div>
            </div>
              
          </div>
        </div>
      </div>
    </div>
  <!-- /table -->
@endsection