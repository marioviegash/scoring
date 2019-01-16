<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Model\File;
use Auth;

class FileController extends Controller
{
    //

    public function upload(Request $request){

        $request->validate([
            'file_upload' => 'required'
        ]);

        $file = $request->file('file_upload');
        // dd($)
        $destinationPath = "file/upload";
        $filename = uniqid() . $file->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);
        $fullpath = $destinationPath.'/'.$filename;
        // $file = $request->file('');
        
        $group_id = Auth::user()->group->id;
        $file1 = File::where('group_id', $group_id)->orderBy('created_at', 'desc')->first();
        if($file1 === null){
            $newFile = new File();
            $newFile->name =  $file->getClientOriginalName();
            $newFile->path = $fullpath;
            $newFile->group_id = Auth::user()->group->id;
            $newFile->saved_by = Auth::id();
            $newFile->save();
        }else{
            $file1->name =  $file->getClientOriginalName();
            $file1->path = $fullpath;
            $file1->save();
        }
        Storage::putFileAs($destinationPath, $file, $filename);
        // $file->save($destinationPath.'/'.$filename);

        return back();
    }

    public function download(){
        
        $group_id = Auth::user()->group->id;
        $file = File::where('group_id', $group_id)->orderBy('created_at', 'desc')->first();
// dd($file);
        return Storage::download($file->path, $file->name);
    }


    

}
