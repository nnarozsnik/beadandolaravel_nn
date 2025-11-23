@extends('frontend.master')

@section('title', $kategoria->nev)

@section('content')
<div class="cream_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="cream_taital">{{ $kategoria->nev }}</h1>
            </div>
        </div>
        <div class="row">
        @foreach($etelek->take(9) as $etel)
           
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
        {{ $etelek->links('pagination::bootstrap-4') }}

        <div style="height:50px;"></div>
    </div>
</div>
    </div>
</div>

@endsection

