<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 12/31/2018
 * Time: 17:22
 */

namespace App\Repositories;


use App\Answer;


class AnswerRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Answer();
    }

    public function next($request, $question, $options)
    {
        //--------------= Option A
        $this->model->option = $request->get('a_option');
        $this->model->answer = $request->get('answer');
        $this->model->question_id = $question->id;
        $this->model->option_id = $options[$request->get('a_option')];
        $this->model->save();
        return true;
    }
    
    /**
     * Store Options  [^_^]
     * @param $request
     */
    public function store($request)
    {
        $this->model->question = $request->get('question');
        $this->model->rate = $request->get('rate');
        $this->model->book_id = $request->get('book_id');
        $this->model->session_id = $request->get('session_id');
        $this->model->save();

    }

    public function delete($answer)
    {
        if(count($answer)>0){
            foreach ($answer as $item) {
                $item->delete();
            }
        }else{
            $answer->delete();
        }

    }

    public function count()
    {
        return Answer::count();
    }

}