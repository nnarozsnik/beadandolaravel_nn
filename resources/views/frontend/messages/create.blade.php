@extends('frontend.master')

@section('title', 'Új üzenet küldése')

@section('content')
<div class="cream_section layout_padding" style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
            <div class="text-center mb-3">
    <a href="{{ route('messages.index') }}" class="btn" 
       style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">
        ← Vissza az üzenetekhez
    </a>
</div>

                <h1 class="mb-4">Új üzenet küldése</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('messages.store') }}">
                    @csrf

                    <div class="mb-3 text-start">
                        <label for="recipient_id" class="form-label"></label>
                        <select name="recipient_id" id="recipient_id" class="form-select" required>
                            <option value="">Válassz felhasználót</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('recipient_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('recipient_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 text-start">
                        <label for="content" class="form-label"></label>
                        <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100"style="background-color: #fc95c4; border: 2px solid #fc95c4; color: white;">Küldés</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection