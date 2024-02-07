<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=Course::all();
        return $course;
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
        $course=new Course;
        activity()
            ->performedOn($course)
            ->log('Look mum, I logged something');


        $course->c_id=$request->c_id;
        $course->c_name=$request->c_name;
        // $course->s_id=$request->s_id;
        // $course->u_id=$request->u_id;
        $result=$course->save();
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
        $sub=Course::find($id);
        return $sub;
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
        $course=Course::find($id);
        $course->c_id=$request->c_id;
        $course->c_name=$request->c_name;
        // $course->s_id=$request->s_id;
        // $course->u_id=$request->u_id;
        $result=$course->save();
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
        $course=Course::find($id);
        $result=$course->delete();
        if($result){
            return [$result=>"deleted"];
        }else{
            return [$result=>"not"];
        }
    }
}
