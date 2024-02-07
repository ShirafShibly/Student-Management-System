<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub=Subject::all();
        return $sub;
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
        $sub=new Subject;
        $sub->s_id=$request->s_id;
        $sub->s_name=$request->s_name;
        $sub->c_id=$request->c_id;
        $result=$sub->save();
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
       $sub=Subject::find($id);

       return $sub;
        // return Subject::where("c_id","like","%".$c_id."%")->get();

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
        $sub=Subject::find($id);
        $sub->s_id=$request->s_id;
        $sub->s_name=$request->s_name;
        $sub->c_id=$request->c_id;
        $result=$sub->save();
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
        $sub=Subject::find($id);
        $result=$sub->delete();
        if($result){
            return [$result=>"deleted"];
        }else{
            return [$result=>"not"];
        }
    }
    public  function findSubjectsByCourse($courseId){

        $sub=Subject::where('c_id',$courseId)->get();

        return response()->json($sub);
    }
}
