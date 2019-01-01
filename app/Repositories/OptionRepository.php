<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 12/31/2018
 * Time: 17:22
 */

namespace App\Repositories;


use App\Option;
use App\Question;

class OptionRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Option();
    }

    public function next($request, $question)
    {
        $options = [];
        //--------------= Option A
        $this->model->text = $request->get('option_a');
        $this->model->option = 'a';
        $this->model->question_id = $question->id;
        $this->model->save();
        $options['a'] = $this->model->id;
        //--------------= Option B
        $this->model = new Option();
        $this->model->text = $request->get('option_b');
        $this->model->option = 'b';
        $this->model->question_id = $question->id;
        $this->model->save();
        $options['b'] = $this->model->id;
        //--------------= Option C
        $this->model = new Option();
        $this->model->text = $request->get('option_c');
        $this->model->option = 'c';
        $this->model->question_id = $question->id;
        $this->model->save();
        $options['c'] = $this->model->id;
        //--------------= Option D
        $this->model = new Option();
        $this->model->text = $request->get('option_d');
        $this->model->option = 'd';
        $this->model->question_id = $question->id;
        $this->model->save();
        $options['d'] = $this->model->id;
        return $options;

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

    public function delete($option)
    {
        if(count($option)>0){
            foreach ($option as $item) {
                $item->delete();
            }
        }else{
            $option->delete();
        }

    }

    public function count()
    {
        return Option::count();
    }

}