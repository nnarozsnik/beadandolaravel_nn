@extends('frontend.master')

@section('title', 'Receptek')

@section('content')
      <!-- cream sectuion start -->
      @foreach($kategoriak as $kategoria)
    <div class="cream_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="cream_text">{{ $kategoria->nev }}</p>
                </div>
            </div>
            <div class="cream_section_2">
                <div class="row">
                @foreach($kategoria->etelek->take(3) as $etel)
                        <div class="col-md-4">
                            <div class="cream_box">
                                <div class="cream_img">
                                <img src="{{ $etel->kep ? asset($etel->kep) : asset('images/default_etel.png') }}" alt="{{ $etel->nev }}">
                                </div>
                                <h6 class="strawberry_text">{{ $etel->nev }}</h6>
                                <div class="cart_bt">
                                    <a href="{{ route('etel.megnezem', $etel->id) }}">Megnézem</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-3">
               <div class="col-md-12 text-center">
               <a href="{{ route('kategoriak.show', $kategoria->id) }}" class="btn btn-pink">További receptek</a>
               <div style="height:50px;"></div>
               </div>
            </div>
            </div>
            </div>
        </div>
    </div>
@endforeach
      <!-- cream sectuion end -->
      <!-- copyright section start -->
    
      <!-- copyright section end -->
 


@endsection