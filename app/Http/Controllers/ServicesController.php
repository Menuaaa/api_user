<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ServicesController extends Controller
{
    //read all services
    public function index(){
        $posts = Services::all();
        return view('admin.services');
    }
}
