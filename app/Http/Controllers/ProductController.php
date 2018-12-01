<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PHPUnit\Framework\MockObject\Stub\Exception;
use App\Shop;

class ProductController extends Controller
{
    	
    public function index(Request $request, $shopId)
    {
        $shop = Shop::find($shopId);
        $products = Product::getAll($shop['shop_db']);
        return response()->json($products, 200);
    }
    public function show(Request $request, $shopId, $id)
    {
        $shop = Shop::find($shopId);
        $product = Product::find($shop['shop_db'], $id);
        return response()->json($product, 200);
    }
    public function store(Request $request, $shopId)
    {
        $shop = Shop::find($shopId);
        $product = Product::create($shop['shop_db'], $request->all());
        return response()->json($product , 201);
    }
    public function update(Request $request, $shopId, $id)
    {
            $shop = Shop::find($shopId);
            if($shop) {
                $category = $request->get('category');
                $product = $request->get('product');
                $discount = $request->get('discount');
                $price = $request->get('price');
                $productEx = Product::find($shop['shop_db'], $id)[0];
                if($category) {
                    $productEx->category = $category;
                } else {
                     $productEx->category = '';
                }
                if($product) {
                    $productEx->product = $product;
                } else {
                    $productEx->product = '';
                }
                if($discount) {
                    $productEx->discount = $discount;
                } else {
                    $productEx->discount = 0;
                }
                if($price) {
                    $productEx->price = $price;
                } else {
                    $productEx->price = 0;
                }
                
                $result = Product::updateProduct($shop['shop_db'], (array)$productEx);
                return response()->json($result, 200);
            }
    }

    public function patch(Request $request, $shopId, $id)
    {
            $shop = Shop::find($shopId);
            if($shop) {
                $category = $request->get('category');
                $product = $request->get('product');
                $discount = $request->get('discount');
                $price = $request->get('price');
                $productEx = Product::find($shop['shop_db'], $id)[0];
                if($category) {
                    $productEx->category = $category;
                }
                if($product) {
                    $productEx->product = $product;
                }
                if($discount) {
                    $productEx->discount = $discount;
                }
                if($price) {
                    $productEx->price = $price;
                }
                
                $result = Product::updateProduct($shop['shop_db'], (array)$productEx);
                return response()->json($result, 200);
            }
    }
    
    public function delete(Request $request, $shopId, $id)
    {
        $shop = Shop::find($shopId);
        if($shop) {
            $product = Product::find($shop['shop_db'], $id)[0];
            Product::deleteProduct($shop['shop_db'], (array)$product);
            return response()->json(null, 204);
        }
    }
}
