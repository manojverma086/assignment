<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $connection = 'mysql';
    public static function getAll($shop) 
    {
        $sql = "SELECT * FROM ".$shop.".product;";
        $products = DB::connection('mysql')->select(DB::raw($sql));
        return $products;
    }

    public static function find($shop, $id)
    {
        $sql = "SELECT * FROM ".$shop.".product where id = ".$id. ";";
        return DB::connection('mysql')->select(DB::raw($sql));
    }

    public static function create($shop, $product)
    {
       $d = DB::connection('mysql')->statement("INSERT INTO ".$shop.".product(category, product, discount, price) values('". $product['category']. "', '". $product['product']. "', '".$product['discount']. "', '". $product['price']. "');");
        $lastId = DB::connection('mysql')->select(DB::raw("SELECT LAST_INSERT_ID();")); 
        $sql = "SELECT * FROM ".$shop.".product where id = ".$lastId[0]->{'LAST_INSERT_ID()'}. ";";
        return DB::connection('mysql')->select(DB::raw($sql));
    }
    public static function updateProduct($shop, $product) 
    {
        $d = DB::connection('mysql')->statement("UPDATE ".$shop.".product SET category ='". $product['category']. "', product ='". $product['product']. "', discount ='".$product['discount']. "', price ='". $product['price']. "' where id= ".$product['id'].";"); 
        $lastId = DB::connection('mysql')->select(DB::raw("SELECT LAST_INSERT_ID();")); 
        $sql = "SELECT * FROM ".$shop.".product where id = ".$product['id'] .";";
        return DB::connection('mysql')->select(DB::raw($sql));
    }
    public static function deleteProduct($shop, $product) {
        return DB::connection('mysql')->statement("DELETE FROM ".$shop.".product where id = ". $product['id'] .";");
    }
}
