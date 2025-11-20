@extends('layout')

@section('content')
    <h1>Ételek listája</h1>
    @foreach($etelek as $etel)
        <div class="etel-card">
            <h2>{{ $etel->nev }}</h2>
            <ul>
                @foreach($etel->hozzavalok as $hozzavalo)
                    <li>{{ $hozzavalo->nev }}{{ $hozzavalo->pivot->egyseg ? ': ' . $hozzavalo->pivot->mennyiseg . ' ' . $hozzavalo->pivot->egyseg : '' }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection