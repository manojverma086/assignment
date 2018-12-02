<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\VarDumper\Server\Connection;

class Shop extends Model
{
    protected $connection = 'information_db';
    protected $fillable = ['shop_name', 'shop_db', 'requests'];

    public static function findShopByName($shopName) {
        $sql = "SELECT * FROM shops WHERE shop_name=".$shopName.";";
        return DB::connection('information_db')->select(DB::raw($sql));
    }
    public static function updateRequestInShop($id) {
        $sql = "UPDATE shops SET requests =  requests + 1 where id = ". $id . ";";
        return DB::connection('information_db')->update(DB::raw($sql));
    }
}
