<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public static $name = "blog";
    public static $logo = "img/logo.svg";
    public static $description = "Rio created this blog @ 2022";
}
