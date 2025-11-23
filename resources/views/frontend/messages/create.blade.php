@ -0,0 +1,34 @@
@extends('frontend.master')

@section('title', 'Új üzenet küldése')

@section('content')
<h1>Új üzenet küldése</h1>

<form method="POST" action="{{ route('messages.store') }}">
    @csrf

    <div class="mb-3">
        <label for="recipient_id" class="form-label">Kinek?</label>
        <select name="recipient_id" id="recipient_id" class="form-select" required>
            <option value="">Válassz felhasználót</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('recipient_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Üzenet</label>
        <textarea name="content" id="content" class="form-control" rows="4" required>{{ old('content') }}</textarea>
        @error('content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Küldés</button>
</form>
@endsection