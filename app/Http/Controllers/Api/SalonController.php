<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\salons;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Laravel\Ui\Presets\React;
use Mockery\Undefined;

class SalonController extends Controller
{
    //read all salons
    public function getSalons()
    {
         return response()->json(salons::all());
    }

    // salons by id
    public function salonById($id)
    {
        $salons = salons::find($id);
        if(is_null($salons)){
            return response()->json([
                "message"=> 'salons not found'
            ], 404);
        }
        return response()->json([$salons::find($id)]);
    }

    // create salons 

    public function createSalons(Request $request)
    {
        $salons = salons::create($request->all());
        return response($salons);
    }

    // update salons

    public function updateSalons(Request $request, $id)
    {
        $salons = salons::find($id);
        if(is_null($salons)){
            return response()->json([
                "message"=> 'salons not found'
            ], 404);
        }

        $salons->update($request->all());
        return response($salons, 200);
    }

    // Delete salons

    public function deleteSalons(Request $request,$id){
        $salons = salons::find($id);
        if(is_null($salons)){
            return response()->json([
                "message"=> 'salons not found'
            ], 404);
    }
    $salons->delete();
    return response()->json(null, 204);
    }



    public function index(){
        $posts = salons::all();
        return view('admin.salons', compact('posts'));
    }

    public function edit_function($id)
    {
        $posts = salons::find($id);
        $post =  DB::select('select * from salons where id = ?', [$id]);
        return view('admin.edit_salon',['post' =>$post]);
    }       

    public function update_func(Request $request)
    {
        $salons_img = $request->file('img');
        $hid_img = $request->input('prev_img');
        if(isset($salons_img))
        {
            $fileName = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->move(public_path('/'), $fileName);
            $photoUrl = url('/'.$fileName);
            if($fileName == '' || $fileName == null){
                $fileName = $hid_img;
            }
        }else{
            $photoUrl = $hid_img;
        }
        $id = $request->input('id');
        $salons_revews = $request->input('revews');
        DB::update('update salons set 
        img = ? , revews = ?  where id = ? ',
         [$photoUrl, $salons_revews , $id]);
        return redirect('admin/salons')->with('success', 'Data updated');
    }


    public function delete(Request $request,$id)
    {
        $salons = salons::find($id);
        if(is_null($salons))
        {
            return 'salons not found';
        }
    $salons->delete();
        return redirect('admin/salons')->with('success', 'Data deleted');
    }

    public function add_salon(Request $request)
    {
        // $salons = salons::create($request->all());
        return view('admin.add_salons');
    }
    public function create_salon(Request $request)
    {
        $salons_img = $_FILES['img']['name'];
        $file= $request->file('img');
        $request->file('img')->store('docs');
        $id = $request->input('id');
        $fileName = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->move(public_path('/'), $fileName);
        $photoUrl = url('/'.$fileName);
        $revews = $request->revews;
        DB::insert('insert into salons ( 
        img, revews) values ( ?, ?)',
         [$photoUrl, $revews]);
        return redirect('admin/salons')->with('success', 'Data updated'); 
        // return response()->json(['url' => $photoUrl], 200);
    }
    }
