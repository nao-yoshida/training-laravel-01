<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //キーワードを取得
        $keyword = $request->input('keyword');

        //もしキーワードが入力されている場合
        if(!empty($keyword))
        {
            //商品名から検索
            $items = DB::table('items')
                ->where('name', 'like', '%'.$keyword.'%')
                ->paginate(4);

            //リレーション関係にあるテーブルの材料名から検索
            $items = Item::whereHas('Categories', function ($query) use ($keyword){
                $query->where('categories', 'like','%'.$keyword.'%');
            })->paginate(4);

        }else{//キーワードが入力されていない場合
            $items = DB::table('items')->paginate(4);
        }
        //検索フォームへ
        return view('search.index',[
            'items' => $items,
            'keyword' => $keyword,
        ]);
    }
}
