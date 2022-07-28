<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Laravel\Ui\Presets\React;

class ServicesController extends Controller
{
    //read all services
    public function getServices()
    {
         return response()->json(Services::all(), 200);
    }

    // service by id
    public function serviceById($id)
    {
        $service = Services::find($id);
        if(is_null($service)){
            return response()->json([
                "message"=> 'service not found'
            ], 404);
        }
        return response()->json([$service::find($id), 200]);
    }

    // create service 

    public function createService(Request $request)
    {
        $service = Services::create($request->all());
        return response($service, 201);
    }

    // update service

    public function updateService(Request $request, $id)
    {
        $service = Services::find($id);
        if(is_null($service)){
            return response()->json([
                "message"=> 'service not found'
            ], 404);
        }

        $service->update($request->all());
        return response($service, 200);
    }

    // Delete service

    public function deleteService(Request $request,$id){
        $service = Services::find($id);
        if(is_null($service)){
            return response()->json([
                "message"=> 'service not found'
            ], 404);
    }
    $service->delete();
    return response()->json(null, 204);
    }













    public function index(){
        $posts = Services::all();
        return view('admin.services', compact('posts'));
    }

    public function edit_function($id)
    {
        $posts = Services::find($id);
        $post =  DB::select('select * from services where id = ?', [$id]);
        return view('admin.edit_services',['post' =>$post]);
    }       

    public function update_func(Request $request)
    {
        $service_img = $_FILES['img']['name'];
        $hid_img = $request->input('prev_img');
        if($service_img == ""){
            $service_img = $hid_img;
        }
        $request->file('img')->store('docs');
        $id = $request->input('id');
        $service_location = $request->input('location');
        $service_price = $request->input('price');
        $service_worker_level = $request->input('worker_level');
        $service_description = $request->input('description');
        $service_title = $request->input('title');
        DB::update('update services set 
        img = ? , 
        location = ? , 
        price = ? , 
        worker_level = ? ,
        description = ? , 
        title = ?  
        where id = ? ',
         [$service_img, $service_location , 
         $service_price , $service_worker_level, $service_description, $service_title, $id]);
        return redirect('admin/services')->with('success', 'Data updated');
    }


    public function delete(Request $request,$id)
    {
        $service = Services::find($id);
        if(is_null($service))
        {
            return 'service not found';
        }
    $service->delete();
        return redirect('admin/services')->with('success', 'Data deleted');
    }

    public function add_service(Request $request)
    {
        // $service = Services::create($request->all());
        return view('admin.add_services');
    }
    public function create_service(Request $request)
    {
        $service_img = $_FILES['img']['name'];
        $file= $request->file('img');
        $request->file('img')->store('docs');
        $id = $request->input('id');
        $service_location = $request->input('location');
        $service_price = $request->input('price');
        $service_worker_level = $request->input('worker_level');
        $service_description = $request->input('description');
        $service_title = $request->input('title');
        DB::insert('insert into services ( 
        img, 
        location, 
        price, 
        worker_level,
        description, 
        title) values ( ?, ?, ?, ?, ?, ?)',
         [$service_img, $service_location , 
         $service_price , $service_worker_level, $service_description, $service_title]);
        return redirect('admin/services')->with('success', 'Data updated');
    }
    }
