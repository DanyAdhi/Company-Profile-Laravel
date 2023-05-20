@extends('layouts.admin')

@section('title', 'Article')

@section('breadcrumbs', 'Edit Article')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('css')
    <script src="/templateEditor/ckeditor/ckeditor.js"></script> 
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12 mb-3">
                    <h3 align="center"></h3>
                </div>
                <form action="{{route('articles.update', [$article->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-10">
                        <div class="mb-4">
                            <label for="title" class="font-weight-bold">Title</label>
                            <input type="text" name="title" placeholder="Article Title" class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" value="{{$article->title}}" required>
                            <div class="invalid-feedback"> {{$errors->first('title')}}</div>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="d-block font-weight-bold">Category</label>
                            <select name="categories[]" id="categories" multiple class="col-12"></select>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="font-weight-bold">Content</label>
                            <textarea id="content" class="form-control ckeditor" name="content" rows="10" cols="50">{{$article->content}}</textarea>
                        </div>
                        <div class="mb-3 mt-4">
                            <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
                            <button class="btn btn-success" name="save_action" value="PUBLISH">Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('script')
    {{-- ckeditor --}}
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl    : "{{route('articles.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod : 'form'
        });
    </script>

    {{-- category select2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $('#categories').select2({
            ajax: {
                url             : '{{url("/admin/ajax/categories/search")}}',
                processResults  : function(data){
                    return {
                        results: data.map(function(item){return {id: item.id, text: item.name} })
                    }
                }
            }
        });

        var categories = {!! $article->categories !!}

            categories.forEach(function(category){
                var option = new Option(category.name, category.id, true, true);
                $('#categories').append(option).trigger('change');
            });
    </script>


@endsection