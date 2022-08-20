<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataTimeRequest;
use App\Http\Resources\BookingsResource;
use App\Http\Resources\ServiceResource;
use App\Models\DataTime;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateTimeCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTime = BookingsResource::collection(DataTime::all());
        return response()->json($dataTime);
    //   return  BookingsResource::collection($dataTime);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataTimeRequest $request)
    {
       $data_user_name = $request->user_name;
        $user_name = User::where('name', $data_user_name)->first();
       $selecting = DB::select("select * from data_times where user_name = ?", [$user_name->name]);
       $service = DB::select('select * from services where id = ?', [$request->service_id]);
    //   dd($service[0]);
    $to_json_service = json_encode(ServiceResource::collection($service));
    // dd($to_json_service);
       $to_json = json_encode(BookingsResource::collection($selecting));
      DB::insert('insert into data_times (
        data,
        time,
        location,
        user_name,
        service_id,
        service)values ( ?, ?, ?, ?, ?, ?)', [$request->data, $request->time,
        $request->location, $request->user_name, $request->service_id ,$to_json_service]);
        DB::update('update users set 
        name = ?,
        email = ?,
        password = ?,   
        bookings = ?,
        phone = ?
        where name = ?
        ', [$user_name->name, $user_name->email, $user_name->password,$to_json, $user_name->phone,$data_user_name]);
        return response()->json([
            'status' => true,
            "message" => "Date created successfully"
        ],200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataTime  $dataTime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataTime = DataTime::find($id);
        if(is_null($dataTime)){
            return response()->json([
                "message"=> 'data not found'
            ], 404);
        }
        return response()->json([$dataTime::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataTime  $dataTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DataTime $dataTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataTime  $dataTime
     * @return \Illuminate\Http\Response
     */
    public function update(DataTimeRequest $request, $id)
    {
        $dataTime = DataTime::find($id);
        $dataTime->data = $request->data;
        $dataTime->time = $request->time;
        $dataTime->hours = $request->hours;
        $dataTime->location = $request->location;
        $result = $dataTime->save();
        if($result)
        {
            return response()->json([
                "result" => 'Date updated successfully',
                "data" => $dataTime
            ],200);
        }else{
            return response()->json([
                "result" => "false"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataTime  $dataTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataTime = DataTime::find($id);
        if(is_null($dataTime)){
            return response()->json([
                "message"=> 'data not found'
            ], 404);
    }
    $dataTime->delete();
    return response()->json(null, 204);
    }
}
