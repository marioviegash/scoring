<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Amoeba    ;
use App\Model\Employee;
use App\Model\Innovator;
use App\Model\Jury;
use App\Model\Group;
use Maatwebsite\Excel\Concerns\FromView;
use App\ExportExcel\ExportRecommendationView;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function ExportExcelRecommendation(Request $request){
        return Excel::download(new ExportRecommendationView, 'users.xlsx');
    }

    public function ViewExport(Request $request){
        $amoebaScore = Amoeba::with('group')->get();
        return view('exports.excel.recommendation-final', [
            'amoebas' => $amoebaScore
        ]);
    }
}
