@extends('frontend.master')

@section('title', 'Új recept feltöltése')

@section('content')
<div class="cream_section layout_padding" style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="text-center mb-4">Új recept feltöltése</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('etelek.storeNew') }}">
                    @csrf

                    <!-- Recept neve -->
                    <div class="mb-3">
                        <label for="nev" class="form-label">Recept neve</label>
                        <input type="text" name="nev" id="nev" class="form-control" value="{{ old('nev') }}" required>
                    </div>

                    <!-- Kategória -->
                    <div class="mb-3">
                        <select name="kategoriaid" id="kategoriaid" class="form-select" required>
                            <option value="">Válassz kategóriát</option>
                            @foreach($kategoriak as $kategoria)
                                <option value="{{ $kategoria->id }}">{{ $kategoria->nev }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Hozzávalók -->
                    <div class="mb-3">
                        <label class="form-label">Hozzávalók</label>
                        <div id="hozzavalok-container">
                            <div class="row mb-2 hozzavalo-row align-items-center">
                                <div class="col-6 col-md-5 mb-1">
                                    <input list="hozzavalok" name="hozzavalo[]" class="form-control" placeholder="Írd be a hozzávalót..." required>
                                    <datalist id="hozzavalok">
                                        @foreach($hozzavalok as $h)
                                            <option value="{{ $h->nev }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col-3 col-md-2 mb-1">
                                    <input type="number" name="mennyiseg[]" class="form-control" placeholder="Mennyiség" required>
                                </div>
                                <div class="col-3 col-md-3 mb-1">
                                    <input type="text" name="egyseg[]" class="form-control" placeholder="Egység pl.: g, db" required>
                                </div>
                                <div class="col-auto mb-1">
                                    <button type="button" class="btn btn-success add-hozzavalo">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Recept feltöltése</button>
                </form>

            </div>
        </div>
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
@endsection