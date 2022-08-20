<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\salons;
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
         return response()->json(ServiceResource::collection(Services::all()));
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
        return response()->json([$service::find($id)]);
    }

    // create service 

    public function createService(Request $request)
    {
        $service = Services::create($request->all());
        return response($service);
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
        $services = Services::all();
        return view('admin.services.services', compact('services'));
    }

    public function edit_function($id)
    {
        $posts = Services::find($id);
        $post =  DB::select('select * from services where id = ?', [$id]);
        return view('admin.services.edit_services',['post' =>$post]);
    }       

    public function update_func(Request $request, $id)
    {
        
        $hid_img = $request->input('prev_img');
        if($request->file('img')){
            $fileName = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->move(public_path('/'), $fileName);
            $photoUrl = url('/'.$fileName);
       }else{
            $photoUrl = $hid_img;
        }

       Services::where('id',$id)->update([
        'img' => $photoUrl, 
        'location' => $request->location, 
        'price' => $request->price, 
        'worker_level' => $request->worker_level,
        'description' => $request->description, 
        'title' => $request->title,
        'revews' => $request->revews,
        'is_available' => $request->is_available
       ]);
        
        return redirect()->route('services.index')->with('success', 'Service updated');
    }


    public function delete($id)
    {
        $service = Services::find($id);
        if(is_null($service))
        {
            return 'service not found';
        }
    $service->delete();
        return redirect()->route('services.index')->with('success', 'Data deleted');
    }

    public function add_service(Request $request)
    {
        // $service = Services::create($request->all());
        return view('admin.services.add_services');
    }
    public function create_service(Request $request)
    {
        $service_img = $_FILES['img']['name'];
        $file= $request->file('img');
        $request->file('img')->store('docs');
        $id = $request->input('id');
        $fileName = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->move(public_path('/'), $fileName);
        $photoUrl = url('/'.$fileName);
        $service_location = $request->input('location');
        $service_price = $request->input('price');
        $service_is_available = $request->input('is_available');
        $service_worker_level = $request->input('worker_level');
        $service_description = $request->input('description');
        $services_revews = $request->input('revews');
        $service_title = $request->input('title');
        DB::insert('insert into services ( 
        image, 
        location, 
        price, 
        worker_level,
        description, 
        title, revews, is_available ) values ( ?, ?, ?, ?, ?, ?,? ,?)',
         [$photoUrl, $service_location , 
         $service_price , $service_worker_level, $service_description, $service_title, $services_revews, $service_is_available]);
        return redirect( route('services.index') )->with('success', 'Data updated'); 
        // return response()->json(['url' => $photoUrl], 200);
    }
    }
