@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">ユーザー一覧</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">新規作成</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メール</th>
            <th>部署</th>
            <th>権限</th>
            <th>ステータス</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department ?? '-' }}</td>
            <td>
                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                    {{ $user->role }}
                </span>
            </td>
            <td>
                <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $user->is_active ? '有効' : '無効' }}
                </span>
            </td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">編集</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('削除しますか？')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">削除</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-muted">ユーザーが登録されていません</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $users->links() }}
@endsection
