@extends('layouts.app')
@section('title', 'カテゴリ登録')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['route' => 'categories.store']) }}
    <div class="form-group">
        {{ Form::label('name', 'カテゴリ名：') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('登録', ['class' => 'btn btn-primary form-control']) }}
    </div>
    <div class="form-group">
        {{ link_to_route('categories.index', '一覧に戻る', [], 'btn btn-primary') }}
    </div>
    {{ Form::close() }}
    @endsection</html>