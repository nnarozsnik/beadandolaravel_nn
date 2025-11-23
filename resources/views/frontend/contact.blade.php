@extends('frontend.master')

@section('title', 'Kapcsolat')

@section('content')
      
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="contact_main">
               <h1 class="contact_taital">Kapcsolat</h1>

               {{-- KAPCSOLAT FELVÉTELI ŰRLAP --}}
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

                  <button type="submit" class="main_bt" style="border:none; width:100%; text-align:center;">
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
                     Call : +36...
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

@endsection