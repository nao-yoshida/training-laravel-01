@extends('layouts.app')
@section('title', '商品登録')
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
    {{ Form::open(['route' => 'items.store']) }}
    <div class="form-group">
        {{ Form::label('name', '商品名：') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('category_id','カテゴリ名') }}
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control'] ) }}

    </div>
    <div class="form-group">
        {{ Form::submit('登録', ['class' => 'btn btn-primary form-control']) }}
    </div>
    <div>
        {{ link_to_route('items.index', '一覧に戻る', [], 'btn btn-primary') }}
    </div>
    {{ Form::close() }}
    @endsection</html>