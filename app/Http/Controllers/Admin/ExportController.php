<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\QuestionRepository;
use App\Utility\Exports\Excel\Admin\QuestionsExport as ExcelQuestionsExport;
use App\Utility\Exports\Word\QuestionsExport as WordQuestionsExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{

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
