<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AnswerRepository;
use App\Repositories\BookRepository;
use App\Repositories\GradeRepository;
use App\Repositories\OptionRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\SessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $grades = (new GradeRepository())->count();
        $books = (new BookRepository())->count();
        $sessions = (new SessionRepository())->count();
        $questions = (new QuestionRepository())->count();
        $options = (new OptionRepository())->count();
        $answers = (new AnswerRepository())->count();
        return view('admin.index.index',compact('options','answers','grades','questions','sessions','books'));
    }
}
