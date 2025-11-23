@extends('frontend.master')

@section('title', 'Elküldött üzenetek')

@section('content')
<div class="cream_section layout_padding" style="padding-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <div class="text-center mb-3">
    <a href="{{ route('messages.index') }}" class="btn" 
       style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">
        ← Vissza az üzenetekhez
    </a>
</div>
                <h1>Elküldött üzeneteim</h1>
                

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Címzett</th>
                                <th>Üzenet</th>
                                <th>Dátum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sentMessages as $msg)
                                <tr>
                                    <td>{{ $msg->recipient?->name ?? 'Ismeretlen' }}</td>
                                    <td>{{ $msg->content }}</td>
                                    <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nincsenek elküldött üzenetek</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="row mt-3">
        <div class="col-md-12 text-center">
            {{ $sentMessages->links('pagination::bootstrap-4') }}
        </div>
    </div>

            </div>
        </div>
    </div>
</div>
@endsection