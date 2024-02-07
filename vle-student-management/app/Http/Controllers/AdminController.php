<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admin= admin::where('name', $request->name)->first();
        // print_r($data);
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);

        }

        $token = $admin->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $admin,
            'token' => $token
        ];

        return response($response, 201);
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
    public function store(Request $request)
    {
        $form=new admin;
        $form->name=$request->name;
        $form->password=$request->password;
        $result=$form->save();
        if($result){
            return [$result=>"success"];
        }else{
            return [$result=>"not"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result=admin::find($id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=admin::find($id);
        $update->name=$request->name;
        $update->password=$request->password;
        $result=$update->save();
        if($result){
            return [$result=>"updated"];
        }else{
            return [$result=>"not"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=admin::find($id);
        $result=$delete->delete();
        if($result){
            return [$result=>"deleted"];
        }else{
            return [$result=>"not"];
        }
    }
}
