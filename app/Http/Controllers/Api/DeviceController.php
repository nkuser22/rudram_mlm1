<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
class DeviceController extends Controller
{

    function list(){
       return Device::all();
    }
}
