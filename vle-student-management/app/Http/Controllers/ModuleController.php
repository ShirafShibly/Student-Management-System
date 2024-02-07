<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module=Module::all();
        return $module;
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
        $result=$request->file('file')->store('public/upload');
        $module=new Module;
        $module->m_id=$request->m_id;
        $module->m_name=$request->m_name;
        $module->file=$request->file->hashName();
        $module->s_id=$request->s_id;
        $result=$module->save();
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
        $module=Module::find($id);
        return $module;
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
        //error
//        $module=$request->file('file')->store('public/upload');
        $module=Module::find($id);
        $module->m_id=$request->m_id;
        $module->m_name=$request->m_name;
//        $module->file=$request->file->hashName();
        $module->s_id=$request->s_id;
        $result=$module->save();
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
        $module=Module::find($id);
        $result=$module->delete();
        if($result){
            return [$result=>"deleted"];
        }else{
            return [$result=>"not"];
        }
    }
    public function  findModuleBySubject($subjectId){
        $mod=Module::where('s_id',$subjectId)->get();
        return response()->json($mod);
    }
    public function  findModuleByFile($fileId){
        $mod2=Module::where('id',$fileId)->get();
        return response()->json($mod2);
    }
}
