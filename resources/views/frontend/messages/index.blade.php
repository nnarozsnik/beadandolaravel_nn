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

                <a href="{{ route('messages.create') }}" class="btn btn-primary mb-3"style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">Új üzenet küldése</a>

                <a href="{{ route('messages.sent') }}" class="btn mb-3" style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">Elküldött üzeneteim</a>

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
                    <div class="row mt-3">
        <div class="col-md-12 text-center">
            {{ $messages->links('pagination::bootstrap-4') }}
        </div>
    </div>
                </div>
                @if(auth()->user()?->role === 'admin')
                <div class="table-responsive">
                    <h3>Adminnak küldött üzenetek</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Feladó</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Üzenet</th>
                                <th>Dátum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contactMessages as $cmsg)
                                <tr>
                                <td>
                                {{ $cmsg->name }}
                                 @if($cmsg->user_id)
                                    <br><small>(Bejelentkezett felhasználó: {{ $cmsg->user?->name }})</small>
                                     @endif
                                        </td>
                                    <td>{{ $cmsg->email }}</td>
                                    <td>{{ $cmsg->phone }}</td>
                                    <td>{{ $cmsg->message }}</td>
                                    <td>{{ $cmsg->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nincsenek üzenetek</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row mt-3">
        <div class="col-md-12 text-center">
            {{ $contactMessages->links('pagination::bootstrap-4') }}
        </div>
    </div>
            @endif

            </div>
        </div>
    </div>
</div>

@endsection