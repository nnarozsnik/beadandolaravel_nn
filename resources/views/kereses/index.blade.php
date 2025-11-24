@extends('frontend.master')

@section('title', 'Keresés')

@section('content')
<div class="container" style="padding-top: 120px;">

    <h1>Keresés</h1>

    <form method="GET" action="{{ route('kereses') }}" class="mb-4">

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Étel neve</label>
                <input type="text" name="q" class="form-control" 
                       value="{{ request('q') }}" placeholder="pl. gulyás">
            </div>

          <div id="hozzavalok-container" class="mb-3">
    <div class="input-group mb-2 hozzavalo-row">
        <input list="hozzavalok" name="hozzavalo[]" class="form-control" placeholder="pl. liszt">
        <datalist id="hozzavalok">
            @foreach($hozzavalok as $h)
                <option value="{{ $h->nev }}"></option>
            @endforeach
        </datalist>
        <button type="button" class="btn btn-success add-hozzavalo" 
                style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">
            +
        </button>
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

            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-primary" style="background:#fc95c4;border:#fc95c4">
                    Keresés
                </button>
            </div>
        </div>

    </form>
    <script>
document.getElementById('kereses-form').addEventListener('submit', function(e) {
   
    setTimeout(() => {
        history.replaceState(null, '', '{{ route('kereses') }}');
    }, 10);
});
</script>
    <hr>

    <h3>Találatok:</h3>

    @if($etelek->count() == 0)
        <p>Nincs találat.</p>
    @endif

    <div class="row">
        @foreach($etelek as $etel)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ ucfirst($etel->nev) }}</h5>
                        <p><strong>Kategória:</strong> {{ $etel->kategoria->nev }}</p>
                        <a href="{{ route('etel.megnezem', $etel->id) }}" class="btn btn-sm btn-outline-primary"  style="text-align:center; background-color: #fc95c4; border: 2px solid #fc95c4; color: white; ">
    Megnyitás
</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
    {{ $etelek->links('pagination::bootstrap-4') }}
    <div style="height:50px;"></div>
</div>

</div>
@endsection