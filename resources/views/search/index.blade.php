//検索フォーム
<div class="container">
       <div class="row">
            <div class="col-md-3">
                <form class="form-inline">
                    <div class="form-group">
                    <input type="text" name="keyword" value="{{ $keyword }}"
                    placeholder="商品名かカテゴリ名を入力">
                    {{Form::submit('検索')}}

                    </div>
                </form>
            </div>
        </div>
    </div>

    //商品名の表示
    <div class="container">
@if(count($items) > 0)
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-3">
                {{ $item->name }}
            </div>
        @endforeach
    </div>
@endif
//ページネーション機能
<div class="paginate">
    {{ $items->render('pagination::bootstrap-4') }}
</div>
</div>