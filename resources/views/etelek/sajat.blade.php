@extends('frontend.master')

@section('title', 'Saját receptjeim')

@section('content')
<div class="cream_section layout_padding" style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h1 class="text-center mb-4">Saját receptjeim</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($etelek->isEmpty())
                    <p>Nincsenek még feltöltött receptjeid.</p>
                @else
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Recept neve</th>
                                <th>Kategória</th>
                                <th>Hozzávalók</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etelek as $etel)
                                <tr>
                                    <td>{{ $etel->nev }}</td>
                                    <td>{{ $etel->kategoria?->nev ?? '-' }}</td>
                                    <td>
                                        @if($etel->hozzavalok->isEmpty())
                                            -
                                        @else
                                            <ul class="mb-0">
                                                @foreach($etel->hozzavalok as $h)
                                                    <li>{{ $h->nev }} 
                                                        ({{ $h->pivot->mennyiseg ?? '' }} 
                                                        {{ $h->pivot->egyseg ?? '' }})
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ route('etelek.edit', $etel->id) }}" class="btn btn-warning btn-sm mb-1"style="
        background-color:rgb(247, 155, 119); 
        border: 2px solid rgb(247, 155, 119); 
        color: #fff;">Szerkesztés</a>
                                        <form method="POST" action="{{ route('etelek.destroy', $etel->id) }}" onsubmit="return confirm('Biztos törölni akarod ezt a receptet?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Törlés</button>
                                        </form>
                                    
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row mt-3">
    <div class="col-md-12 text-center">
        {{ $etelek->links('pagination::bootstrap-4') }}
    </div>
</div>

                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('etelek.create') }}" class="btn btn-success"style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">Új recept feltöltése</a>
            <div style="height:50px;"></div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection