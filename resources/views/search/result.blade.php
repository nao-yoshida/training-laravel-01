
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