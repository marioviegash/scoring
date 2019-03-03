<?php
namespace App\ExportExcel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Model\Amoeba;



class ExportRecommendationView implements FromView
{
    public function view(): View
    {
        $amoebaScore = Amoeba::with('group')->get();

        return view('exports.excel.recommendation-final', [
            'amoebas' => $amoebaScore
        ]);
    }
}