@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/Tugu-Jogja.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
        .form-control:focus {
          box-shadow: none;
        }

        .form-control::placeholder {
          font-size: 0.95rem;
          color: #aaa;
          font-style: italic;
        }
        .article{
          line-height: 1.6;
          font-size: 15px;
        } 
    </style>    
@endsection

@section('hero')
    <h1>Blog Jogja-Travel</h1>
    <h2>Kumpulan artikel-artikel wisata Jogja, Tips travelling, dan kesehatan</h2>
@endsection


@section('content')  
      <!--========================== Article Section ============================-->
      <section id="about">
        <div class="container wow fadeIn">

          <div class="row">
            <div class="col-9">
              
              @if (empty(request()->segment(2)) )
                @component('user.component.all_blog', ['articles'=> $articles])
                @endcomponent
              @else
                @component('user.component.single_blog', ['article'=> $articles])
                @endcomponent
              @endif


            </div>
            <div class="col-3">
                <form action="{{route('blog')}}" class="mt-5">
                  <div class="input-group mb-4 border rounded-pill shadow-lg" style="border-radius:10px; box-shadow: 3px 3px 8px grey;">
                    <input type="text" name="s" value="{{Request::get('s')}}" placeholder="Apa yang ingin anda cari?" class="form-control bg-none border-0" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                    <div class="input-group-append border-0">
                      <button type="submit" class="btn text-success"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
                <div class="mb-3 font-weight-bold">Recent Posts</div>
                @foreach ($recents as $recent)
                  <div>
                      <a href="{{route('blog.show', [$recent->slug])}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 
                        {{$recent->title}}
                      </a>
                      <hr >
                  </div>
                @endforeach
            </div>
          </div>

        </div>
      </section><!-- #services -->
  
     
@endsection