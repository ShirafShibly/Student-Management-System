<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserRegister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reg = User::all();
        return $reg;
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
        $reg=new User;
        $reg->u_id=$request->u_id;
        $reg->name=$request->name;
        $reg->email=$request->email;
        $reg->password=Hash::make($request->password);
        $reg->c_id=$request->c_id;
        $result=$reg->save();
        if($result){
            return ["$result","success"];
        }else{
            return["$result","not"];
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
        $reg=User::find($id);
        return $reg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update=User::find($id);
        $update->u_id=$request->u_id;
        $update->name=$request->name;
        $update->email=$request->email;
        $update->password=Hash::make($request->password);
        $update->c_id=$request->c_id;
        $result=$update->save();
        if($result){
            return ["$result","updated"];
        }else{
            return["$result","not"];
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
        //
    }
}
