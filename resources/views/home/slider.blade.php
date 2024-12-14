<section class="home-slider owl-carousel">
    @foreach ($sliders as $item)
    <div class="slider-item" style="background-image: url({{ asset('uploads/slider/'.$item->background) }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span style="font-family: 'Kh Metal Chrieng', sans-serif; color:yellow;font-size : 35px;">{{$item->description_upper}}</span>
            <h1 style="font-family: 'Khmer OS Siemreap', sans-serif;font-size : 50px;" >{{$item->description_middle}}</h1>
            <p style="font-family: 'Kh Metal Chrieng', sans-serif; font-size : 20px;">{{$item->description_lower}}</p>
            <!--<p style="font-family: 'Kh Dangrek', sans-serif;"><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3" style="font-size: 17.5px;">ទីតាំងតាន់យ៉ុង</a>
                <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3" style="font-size: 17.5px;">អំពីតាន់យ៉ុង</a></p>-->
          </div>

        </div>
      </div>
    </div>
    @endforeach
  </section>
