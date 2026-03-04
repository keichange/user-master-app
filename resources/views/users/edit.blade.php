@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="h3 mb-4">ユーザー編集</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('users._form')
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection
