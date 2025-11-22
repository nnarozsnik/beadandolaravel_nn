@extends('frontend.master')

@section('title', 'Üzenetek')

@section('content')

<div class="cream_section layout_padding" style="padding-top: 100px;"> {{-- a navbar magasságához igazítva --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <h1>Üzeneteim</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('messages.create') }}" class="btn btn-primary mb-3">Új üzenet küldése</a>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Feladó</th>
                                <th>Üzenet</th>
                                <th>Dátum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                                <tr>
                                    <td>{{ $msg->user?->name ?? 'Ismeretlen feladó' }}</td>
                                    <td>{{ $msg->content }}</td>
                                    <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nincsenek üzenetek</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection