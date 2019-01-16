<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DocumentGraph;
use App\Model\DocumentGraphGroup;
use Storage;

class GraphController extends Controller
{
    public function upload(Request $request){
        $request->validate([
            'upload' => 'required',
        ]);

        $file = $request->file('upload');
        $destinationPath = "img/upload/graph";
        $filename = uniqid() . $file->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);
        $fullpath = $destinationPath.'/'.$filename;
        $file->move( $destinationPath,$filename);

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

        foreach($request->file('uploads') as $index => $graph) {
            $destinationPath = "img/upload/graph";
            $filename = uniqid() . $graph->getClientOriginalName();
            $filename = str_replace(" ", "", $filename);
            $fullpath = $destinationPath . '/' . $filename;
            $graph->move($destinationPath, $filename);

            $file1 = DocumentGraph::where('amoeba_id', $request->amoebas[$index])->orderBy('created_at', 'desc')->first();
            if ($file1 === null) {
                $newFile = new DocumentGraph();
                $newFile->name = $graph->getClientOriginalName();
                $newFile->path = $fullpath;
                $newFile->amoeba_id = $request->amoebas[$index];
                $newFile->save();
            } else {
                $file1->name = $graph->getClientOriginalName();
                $file1->path = $fullpath;
                $file1->save();
            }
        }

        return back()->with('message', 'success');;
    }
}
