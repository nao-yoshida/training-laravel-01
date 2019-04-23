@extends('layouts.app')
@section('title', '商品一覧')
@section('content')
    {{ link_to_route('items.create', '新規登録', [], ['class' => 'btn btn-primary']) }}
    {{ link_to_route('categories.index', 'カテゴリ一覧へ( ^^) _旦~~', [], ['class' => 'btn btn-primary']) }}
    <br>
    {{Form::open(['method' => 'GET', 'route' => 'items.search'])}}
    {{Form::text('keyword',null)}}
    {{Form::submit('検索', ['class' => 'input'])}}
    {{Form::close()}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>カテゴリ名</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                <td>{{$item->name}}</td>
                <td>{{ link_to_route('categories.show', $item->category->name, ['id' => $item->category->id])}}</td>
                <td>{{ link_to_route('items.edit', '編集', ['id' => $item->id], ['class' => 'btn btn-default']) }}</td>
                <td>
                    {{ Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection