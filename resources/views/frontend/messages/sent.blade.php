@extends('frontend.master')

@section('title', 'Elküldött üzenetek')

@section('content')
<div class="cream_section layout_padding" style="padding-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

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

            </div>
        </div>
    </div>
</div>
@endsection