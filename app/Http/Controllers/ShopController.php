<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Concat;
use App\Shop;
use Illuminate\Support\Facades\DB;
use App\Product;

class ShopController extends Controller
{
    //
    public function index()
    {
        return Shop::all();
    }
 
    public function show($id)
    {
        return Shop::find($id);
    }

    public function store(Request $request)
    {
        $shopName = $request->get('shop_name');
        $temp = explode(" ", $shopName);
        $request->request->set('shop_db', strtolower($temp[0]."_".$temp[1]));
        $request->request->set('requests', 0);
        $shop = Shop::create($request->all());
        if(DB::connection('mysql')->statement("CREATE DATABASE ". $shop['shop_db'] ." DEFAULT CHARACTER SET utf8;")) {
            DB::connection('mysql')->statement("CREATE TABLE ".$shop['shop_db'].".product( id int(10) not null auto_increment primary key , category varchar(20) not null, product varchar(20) not null, discount integer(4), price integer(10))");
        };
        return response()->json($shop, 201);
    }
    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->update($request->all());
        return response()->json($shop, 200);
    }

    public function delete(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        if(DB::connection('mysql')->statement("DROP DATABASE ". $shop['shop_db'])) {
           return response()->json(null, 204);
        };
    }
}
