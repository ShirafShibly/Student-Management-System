<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileSystem;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function upload(Request $request)
    {
        $result=$request->file('file')->store('public/upload');
        $file=new FileSystem;
        // $file->file_name=$request->file_name;
        // $file->description=$request->description;
        $file->file=$request->file->hashName();
        $res=$file->save();
        if($res){
            return ["result"=>"success"];
        }else{
        return ["result"=>"not"];
    }

    }
    public function show($id)
    {
        $result=FileSystem::find($id);
        return $result;
    }
   
}