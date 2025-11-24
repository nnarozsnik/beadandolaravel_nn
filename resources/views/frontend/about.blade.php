@extends('frontend.master')

@section('title', 'Rólunk')

@section('content')
<div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_img">
                    <img src="{{ asset('images/about-img.jpg') }}" alt="About Image">
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="about_taital">Az oldalról</h1>
                <p class="about_text">
                Ez az oldal lehetőséget biztosít a felhasználóknak, hogy saját receptjeiket feltöltsék, szerkesszék és megosszák másokkal. A felhasználók böngészhetik mások ételeit, inspirációt meríthetnek a különböző kategóriákból, és üzenetet is küldhetnek egymásnak. A közösség segítségével folyamatosan bővül a virtuális receptkönyv, így mindenki hozzájárulhat a gasztronómiai ötletek gazdagításához.
                Az oldal 2025-ben indult.
                </p>
              
            </div>
        </div>
    </div>
</div>


@endsection