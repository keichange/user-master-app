@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="h3 mb-4">ユーザー新規作成</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @include('users._form')
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">作成</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection
