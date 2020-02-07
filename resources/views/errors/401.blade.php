@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="alert alert-danger">
                <h1>401</h1>
            <h4>{{$exception->getMessage()}}</h4>
            </div>
        </div>
    </div>
@endsection