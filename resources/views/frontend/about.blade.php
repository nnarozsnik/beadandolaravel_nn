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
                Az oldal működésének lényege, hogy a felhasználók együtt tudják gazdagítani ezt a virtuális receptkönyvet. Amely receptnél nincs elkészítés, azokat a bejelentkezett felhasználók saját bevált elkészítés alapján kiegészíthetik leírásokkal. Ezzel bátorítva az olvasóinkat, hogy nyugodtan eltérhetnek a receptektől, hiszen a felhasználók által tapasztalt különböző elkészítési módokból tanulhatunk. Kellemes időtöltést a konyhában, és jó étvágyat az ételhez!
                </p>
              
            </div>
        </div>
    </div>
</div>
@endsection