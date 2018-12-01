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
}
