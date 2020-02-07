@if (count($destinations) != 0)
    <div class=" wow fadeInUp">
      <div class="section-header">
        <h3 class="section-title">Daftar Destinasi</h3>
        <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      </div>
    </div>
    <div class=" wow fadeInUp">
      <div class="row justify-content-left">
        @foreach ($destinations as $destination)
          <div class="col-lg-4 col-md-6">
            <a href="{{route('destination.show', $destination->slug)}}" class="decoration-none">
                <div class="row">
                  <div class="col-11 full-img" style="background-image: url({{asset('destinations_image/'.$destination->image)}})"></div>
                </div>
                <div class="row">
                  <div class="col px-0 pt-2">
                    <h4 style="color: #666666 !important;">{{$destination->title}}</h4>
                  </div>
                </div>
              </a>
            </div> 
        @endforeach
      </div>
    </div>

@else
  <style>
    .page {
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 100;
        height: 100vh;
    }

  </style>
  <div class="full-height bg-white mt-5 d-flex align-items-center justify-content-center" style="height: 10vh;">
    <div class="code font-weight-bold text-center" style="border-right: 3px solid; font-size: 60px; padding: 0 15px 0 15px;">
      404
    </div>
    <div class="text-center" style="padding: 10px; font-size: 46px;">
      Not Found
    </div>
  </div>
@endif