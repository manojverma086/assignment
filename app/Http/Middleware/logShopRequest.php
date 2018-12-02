<?php

namespace App\Http\Middleware;

use Closure;
use App\Shop;

class logShopRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shopId = $request->route('shopId');
        $shop = Shop::updateRequestInShop($shopId);
        return $next($request);
    }
}
