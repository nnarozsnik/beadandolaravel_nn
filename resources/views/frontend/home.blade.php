@extends('frontend.master')

@section('title', 'Főoldal')

@section('content')




<!-- banner section start --> 
<div class="banner_section layout_padding">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            
            
        <ol class="carousel-indicators">
    @foreach($randomEtelek as $index => $etel)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}">
            {{ $index + 1 }}
        </li>
    @endforeach
        </ol>

            <div class="carousel-inner">
                @foreach($randomEtelek as $index => $etel)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="banner_taital">{{ $etel->kategoria->nev }}</h1>
                                <p class="banner_text">{{ $etel->nev }}</p>
                               
                               
                                <div class="started_text">
                               
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="banner_img">
                            @if($etel->kep)
                           <img src="{{ asset($etel->kep) }}" alt="{{ $etel->nev }}">
                           @elseif($etel->kategoria && $etel->kategoria->kep)
                           <img src="{{ asset($etel->kategoria->kep) }}" alt="{{ $etel->kategoria->nev }}">
                            @else
                            <img src="{{ asset('images/default_etel.png') }}" alt="Placeholder">
                            @endif
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

         
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>

        </div>
        <div class="position-absolute" style="top: 35%; left: 20%;">
        <a href="{{ url('/receptek/'.$randomEtelek[0]->id) }}" class="bt-megnezem">Megnézem</a>
    </div>

    </div>
</div>
<!-- banner section end -->

      <!-- about sectuion start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_img"><img src="images/about-img.jpg"></div>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital">Az oldalról</h1>
                  <p class="about_text">Az oldal működésének lényege, hogy a felhasználók együtt tudják gazdagítani ezt a virtuális receptkönyvet.</p>
                  <div class="read_bt_1"><a href="{{ url ('/about') }}">Tovább olvasom</a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about sectuion end -->
     
      <!-- testimonial section start -->
      <div class="testimonial_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="testimonial_taital">Legújabb receptjeink</h1>
               </div>
            </div>
            <div class="testimonial_section_2">
               <div class="row">
                  <div class="col-md-12">
                     <div class="testimonial_box">
                        <div id="main_slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
    @foreach($latestEtelek as $index => $etel)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <p class="testimonial_text">{{ ucfirst($etel->kategoria->nev ?? 'N/A') }}</p>
            <h4 class="client_name">{{ ucfirst($etel->nev) }}</h4>
            <div class="client_img">
            <img src="{{ $etel->kep ? asset($etel->kep) : asset('images/default_etel.png') }}" 
     alt="{{ $etel->nev }}" 
     class="latest-recept-img">

     <div class="mt-2">
        <a href="{{ route('etel.megnezem', $etel->id) }}" class="btn btn-sm btn-primary"style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">
            Megnézem
        </a>
    </div>

</div>
        </div>
    @endforeach
</div>
                           <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                           <i class="fa fa-angle-left"></i>
                           </a>
                           <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                           <i class="fa fa-angle-right"></i>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- testimonial section end -->
    <!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="contact_main">
               <h1 class="contact_taital">Kapcsolat</h1>

               <form action="{{ route('kapcsolat.send') }}" method="POST">
                  @csrf

                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Név" name="name" required>
                  </div>

                  <div class="form-group">
                     <input type="email" class="email-bt" placeholder="Email" name="email" required>
                  </div>

                  <div class="form-group">
                  <input type="text" id="phone" class="email-bt" placeholder="Mobil" name="phone">

<script>
document.getElementById('phone').addEventListener('input', function () {

    this.value = this.value.replace(/[^0-9+]/g, '');
});
</script>
                  </div>

                  <div class="form-group">
                     <textarea class="massage-bt" placeholder="Üzenet" rows="5" name="message" required></textarea>
                  </div>

                  <button type="submit" class="main_bt" style="border:none; width:100%; display:block; text-align:center;"style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">
                     KÜLDÉS
                  </button>
               </form>

            </div>
         </div>

         <div class="col-md-8">
            <div class="location_text">
               <ul>
                  <li>
                     <a href="#">
                     <span class="padding_left_10 active"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                     
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="padding_left_10"><i class="fa fa-phone" aria-hidden="true"></i></span>
                     Call : +36....
                     </a>
                  </li>
                  <li>
                     <a href="#">
                     <span class="padding_left_10"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                     Email : elek1234666@gmail.com
                     </a>
                  </li>
               </ul>
            </div>

            <div class="mail_main">
              
            
            </div>

            <div class="footer_social_icon">
              
            </div>
         </div>
      </div>
   </div>
</div>
<!-- contact section end -->

      <!-- copyright section start -->
    
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 




@endsection