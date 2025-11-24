@extends('frontend.master')

@section('title', $etel->nev)

@section('content')
<div class="cream_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="cream_taital">{{ $etel->nev }}</h1>
                <p class="cream_text">Kategória: {{ ucfirst($etel->kategoria->nev) }}</p>
                <div class="cream_img">
                <img src="{{ $etel->kep ? asset($etel->kep) : asset('images/default_etel.png') }}" alt="{{ $etel->nev }}">
                </div>
                <h3>Hozzávalók</h3>
                <ul>
                 @foreach($etel->hozzavalok as $hozzavalo)
                 <li> {{ $hozzavalo->pivot->mennyiseg }} {{ $hozzavalo->pivot->egyseg }} {{ $hozzavalo->nev }} </li>
                 @endforeach
                </ul>

                
                
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="cream_text">Más receptek a kategóriából</h3>
            </div>
            @foreach($masEtelek as $me)
                <div class="col-md-4">
                    <div class="cream_box">
                        <div class="cream_img">
                        <img src="{{ $etel->kep ? asset($etel->kep) : asset('images/default_etel.png') }}" alt="{{ $etel->nev }}">
                    
                        </div>
                        <h6 class="strawberry_text">{{ $me->nev }}</h6>
                        <div class="cart_bt">
                            <a href="{{ route('etel.megnezem', $me->id) }}">Megnézem</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
    <div class="col-md-12 text-center">
        <a href="{{ route('kategoriak.show', $etel->kategoria->id) }}" class="btn btn-pink">További receptek</a>
    </div>
</div>
</div>
@endsection