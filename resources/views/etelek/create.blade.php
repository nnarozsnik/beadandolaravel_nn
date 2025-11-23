@extends('frontend.master')

@section('title', isset($etel) ? 'Recept szerkesztése' : 'Új recept feltöltése')

@section('content')
<div class="cream_section layout_padding" style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">

                <h1>{{ isset($etel) ? 'Recept szerkesztése' : 'Új recept feltöltése' }}</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ isset($etel) ? route('etelek.update', $etel->id) : route('etelek.storeNew') }}">
                    @csrf
                    @if(isset($etel))
                        @method('PUT')
                    @endif

                    <div class="mb-3 text-start">
                        <label for="nev" class="form-label">Recept neve</label>
                        <input type="text" name="nev" id="nev" class="form-control" 
                               value="{{ $etel->nev ?? old('nev') }}" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="kategoriaid" class="form-label"></label>
                        <select name="kategoriaid" id="kategoriaid" class="form-select" required>
                            <option value="">Válassz kategóriát</option>
                            @foreach($kategoriak as $kategoria)
                                <option value="{{ $kategoria->id }}"
                                    {{ isset($etel) && $etel->kategoriaid == $kategoria->id ? 'selected' : '' }}>
                                    {{ $kategoria->nev }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label"></label>
                        <div id="hozzavalok-container">
                            @php
                                $hozzavalokList = isset($etel) ? $etel->hozzavalok : [null];
                            @endphp

                            @foreach($hozzavalokList as $h)
                                <div class="row mb-2 hozzavalo-row">
                                    <div class="col">
                                        <input list="hozzavalok" name="hozzavalo[]" class="form-control" 
                                               placeholder="Írd be a hozzávalót..." 
                                               value="{{ $h->nev ?? '' }}" required>
                                        <datalist id="hozzavalok">
                                            @foreach($hozzavalok as $hozzavaloOption)
                                                <option value="{{ $hozzavaloOption->nev }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="mennyiseg[]" class="form-control" 
                                               placeholder="Mennyiség" 
                                               value="{{ $h->pivot->mennyiseg ?? '' }}" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="egyseg[]" class="form-control" 
                                               placeholder="Egység pl.: g, db" 
                                               value="{{ $h->pivot->egyseg ?? '' }}" required>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-success add-hozzavalo"
                                                style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">+</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const container = document.getElementById('hozzavalok-container');

                            container.addEventListener('click', function(e) {
                                if(e.target.classList.contains('add-hozzavalo')) {
                                    const row = e.target.closest('.hozzavalo-row');
                                    const newRow = row.cloneNode(true);
                                    newRow.querySelectorAll('input').forEach(input => input.value = '');
                                    container.appendChild(newRow);
                                }
                            });
                        });
                    </script>

                    <button type="submit" class="btn btn-success mt-3"
                            style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">
                        {{ isset($etel) ? 'Módosítás mentése' : 'Recept feltöltése' }}
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection