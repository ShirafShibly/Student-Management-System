<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=Student::all();
        return $result;
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
        $form=new Student;
        $form->name=$request->name;
        $form->nic=$request->nic;
        $form->email=$request->email;
        $form->age=$request->age;
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
        $result=Student::find($id);
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
        $update=Student::find($id);
        $update->name=$request->name;
        $update->nic=$request->nic;
        $update->email=$request->email;
        $update->age=$request->age;
        $result=$update->save();
        if($result){
            return [$result=>"updated"];
        }else{
            return[$result=>"not updated"];
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
        $delete=Student::find($id);
        $result = $delete->delete();
        if($result){
            return [$result=>"deleted"];
        }else{
            return [$result=>"not deleted"];
        }
    }
}
