<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function create(Request $request)
    {
        $about = AboutUs::create($request->all);
        return response($about);
    }
    public function read(Request $request)
    {
        return response()->json(AboutUs::all());
    }
    public function update(Request $request)
    {
        $about = AboutUs::all();
        $about->update($request->all());
        return response($about, 200);
    }
    public function delete(Request $request){
        $about = AboutUs::all();
        if(is_null($about)){
            return response()->json([
                "message"=> 'about not found'
            ], 404);
    }
    $about->delete();
    return response()->json(null, 204);
    }


    


//without api

    public function index(){
        $about = AboutUs::all();
        return view('admin.aboutUs', compact('about'));
    }

    public function edit_function($id)
    {
        $posts = AboutUs::find($id);
        $post =  DB::select('select * from about_us where id = ?', [$id]);
        return view('admin.edit_about',['post' => $post]);
    }       

    public function update_func(Request $request)
    {
        $prev_first_img = $request->input('prev_first_img');
        $prev_second_img = $request->input('prev_second_img');
        $prev_third_img = $request->input('prev_third_img');
        if($request->file('first_image')){
            $first_fileName = $request->file('first_image')->getClientOriginalName();
        $first_path = $request->file('first_image')->move(public_path('/'), $first_fileName);
        $first_photoUrl = url('/'.$first_fileName);
        }else{
            $first_photoUrl = $prev_first_img;
        }
        if($request->file('second_image')){
            $second_fileName = $request->file('second_image')->getClientOriginalName();
            $second_path = $request->file('second_image')->move(public_path('/'), $second_fileName);
            $second_photoUrl = url('/'.$second_fileName);
        }else{
            $second_photoUrl = $prev_second_img;
        }
        if($request->file('third_image')){
            $third_fileName = $request->file('third_image')->getClientOriginalName();
            $third_path = $request->file('third_image')->move(public_path('/'), $third_fileName);
            $third_photoUrl = url('/'.$third_fileName);
        }else{
            $third_photoUrl = $prev_third_img;
        }

        $id = $request->input('id');
        $title = $request->input('title');
        $text = $request->input('text');
        DB::update('update about_us set 
        title = ? , 
        text = ? , 
        first_image = ? , 
        second_image = ? ,
        third_image = ?
        where id = ? ',
         [$title, $text , 
         $first_photoUrl , $second_photoUrl, $third_photoUrl,$id]);
        return redirect('admin/aboutus')->with('success', 'Data updated');
    }


    public function delete_aboutus(Request $request,$id)
    {
        $about = AboutUs::find($id);
        if(is_null($about))
        {
            return 'about not found';
        }
    $about->delete();
        return redirect('admin/aboutus')->with('success', 'Data deleted');
    }

    public function add_aboutus(Request $request)
    {
        // $service = Services::create($request->all());
        return view('admin.add_aboutus');
    }
    public function create_aboutus(Request $request)
    {
        $first_fileName = $request->file('first_image')->getClientOriginalName();
        $first_path = $request->file('first_image')->move(public_path('/'), $first_fileName);
        $first_photoUrl = url('/'.$first_fileName);
        $second_fileName = $request->file('second_image')->getClientOriginalName();
        $second_path = $request->file('second_image')->move(public_path('/'), $second_fileName);
        $second_photoUrl = url('/'.$second_fileName);
        $third_fileName = $request->file('third_image')->getClientOriginalName();
        $third_path = $request->file('third_image')->move(public_path('/'), $third_fileName);
        $third_photoUrl = url('/'.$third_fileName);
        $id = $request->input('id');
        $title = $request->input('title');
        $text = $request->input('text');
        DB::insert('insert into about_us ( 
        title, 
        text, 
        first_image, 
        second_image,
        third_image) values ( ?, ?, ?, ?, ?)',
         [$title, $text , 
         $first_photoUrl , $second_photoUrl, $third_photoUrl]);
        return redirect('admin/aboutus')->with('success', 'Data updated'); 
        // return response()->json(['url' => $photoUrl], 200);
    }
    }








