@extends('layouts.app')
@section('title', 'カテゴリ詳細')
@section('content')
    {{ link_to_route('categories.index', '(; ･`д･´)カテゴリ一覧に戻る', [], ['class' => 'btn btn-primary']) }}
    <p>ID：{{ $category->id }}</p>
    <p>カテゴリ名：{{ $category->name }}</p>
    <p>登録日：{{ $category->created_at }}</p>
    <p>更新日：{{ $category->updated_at }}</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                <td>{{$item->name}}</td>
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