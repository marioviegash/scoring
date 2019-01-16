<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DocumentGraph;
use App\Model\DocumentGraphGroup;
use Storage;

class GraphController extends Controller
{
    //

    public function uploadGroup(Request $request){
        $request->validate([
            'file_upload' => 'required'
        ]);

        $file = $request->file('file_upload');
        // dd($)
        $destinationPath = "img/upload/graph";
        $filename = uniqid() . $file->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);
        $fullpath = $destinationPath.'/'.$filename;
        $file->move( $destinationPath,$filename);
        
        // $file = $request->file('');
        
        $group_id = $request->group_id;
        $file1 = DocumentGraphGroup::where('group_id', $group_id)->orderBy('created_at', 'desc')->first();
        if($file1 === null){
            $newFile = new DocumentGraphGroup();
            $newFile->name =  $file->getClientOriginalName();
            $newFile->path = $fullpath;
            $newFile->group_id = $request->group_id;
            $newFile->save();
        }else{
            $file1->name =  $file->getClientOriginalName();
            $file1->path = $fullpath;
            $file1->save();
        }
        
        // $file->save($destinationPath.'/'.$filename);

        return back();
    }

    public function upload(Request $request){
        $request->validate([
            'file_upload' => 'required'
        ]);

        $file = $request->file('file_upload');
        // dd($)
        
        $file = $request->file('file_upload');
        
        $destinationPath = "img/upload/graph";
        $filename = uniqid().$file->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);
        $fullpath = $destinationPath.'/'.$filename;
        $file->move( $destinationPath,$filename);
        
        // $file = $request->file('');
        
        $group_id = $request->group_id;
        $file1 = DocumentGraph::where('amoeba_id', $request->amoeba_id)->orderBy('created_at', 'desc')->first();
        if($file1 === null){
            $newFile = new DocumentGraph();
            $newFile->name =  $file->getClientOriginalName();
            $newFile->path = $fullpath;
            $newFile->amoeba_id = $request->amoeba_id;
            $newFile->save();
        }else{
            $file1->name =  $file->getClientOriginalName();
            $file1->path = $fullpath;
            $file1->save();
        }
        // Storage::putFileAs($destinationPath, $file, $filename);
        // $file->save($destinationPath.'/'.$filename);

        return back();
    }
}
