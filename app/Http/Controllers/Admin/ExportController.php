<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GradeRepository;
use App\Repositories\QuestionRepository;
use App\Utility\Exports\Excel\Admin\QuestionsExport as ExcelQuestionsExport;
use App\Utility\Exports\ExportHandler;
use App\Utility\Exports\Word\QuestionsExport as WordQuestionsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function index(Request $request)
    {
        $grades = (new GradeRepository())->all();
        $questions = (new QuestionRepository())->getFilter($request);
        $exporter = new ExportHandler($questions, $request);
        $exporter->downloader();
        return view('admin.export.index',compact('questions','grades','request'));
    }

    public function excel()
    {
        return Excel::download(new ExcelQuestionsExport, 'Questions.xlsx');
    }

    public function word()
    {
        return (new WordQuestionsExport)->download();
    }

    public function pdf()
    {

    }
}
