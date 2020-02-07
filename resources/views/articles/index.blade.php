@extends('layouts.admin')

@section('title', 'Articles')

@section('breadcrumbs', 'Overview Articles')

@section('css')
    <style>
        .underline:hover{
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    {{-- button create --}}
                    <div class="mb-5 text-right">
                        <a href="{{route('articles.create')}}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Create</a>
                    </div>

                    {{-- display filter --}}
                    <div class="row mb-3">
                        <div class="col-sm-7">
                            <ul class="nav nav-tabs ">
                                <li class="nav-item">
                                    <a class="nav-link p-2 px-3 {{Request::get('status') == NULL ? 'active' : ''}}" href="{{route('articles.index')}}">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2 px-3 {{Request::get('status') == 'publish' ?'active' : '' }}" href="{{route('articles.index', ['status' =>'publish'])}}">Publish</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-2 px-3 {{Request::get('status') == 'draft' ?'active' : '' }}" href="{{route('articles.index', ['status' =>'draft'])}}">Draft</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-5">
                            <form action="{{route('articles.index')}}">
                                <div class="input-group">
                                    <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
                                    <div class="input-group-append">
                                        <input type="submit" value="Filter" class="btn btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- alert --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    
                    {{-- table --}}
                    <table class="table">
                        <thead class="text-light" style="background-color:#33b751 !important">
                            <tr>
                                <th width="12px">No</th>
                                <th class="text-center">Article Title</th>
                                <th width="150px"></th>
                                <th width="88px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $index => $article)                            
                                
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>
                                        <a href="{{route('articles.edit', [$article->id])}}" style="color:#00838f;" class="underline">
                                            <span class="d-block">{{$article->title}}</span>
                                        </a>


                                        @foreach($article->categories as $value)
                                            <a class="d-inline underline" href="{{route('articles.index', ['c' =>$value->name])}}">
                                                <span class="text-muted font-italic" style="font-size:10px; margin-top:10px ;line-height: 60%">{{$value->name}},</span>
                                            </a>
                                        @endforeach
                                    </td>
                                    <td class="text-right pr-4">
                                        @if ($article->status=='DRAFT')
                                            <span class="font-italic text-danger">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('articles.edit', [$article->id])}}" class="bnt btn-sm btn-warning text-light" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form class="d-inline" method="POST" action="{{route('articles.destroy', [$article->id])}}" >
                                            @method('delete')
                                            @csrf   
                                            <button type="submit" class="btn btn-sm btn-danger " title="Delete"><i class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{$articles->appends(Request::all())->links()}}
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection