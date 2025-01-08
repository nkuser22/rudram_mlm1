<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class dummyController extends Controller
{
    function getData(){

        return ["id"=>1,"name"=>'Naresh kumar',"Email"=>'test@gmail.com'];
    }
}
