<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 12/31/2018
 * Time: 17:22
 */

namespace App\Repositories;


use App\Question;

class QuestionRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Question();
    }

    /**
     * Store Question  [^_^]
     * @param $request
     * @return bool
     */
    public function store($request)
    {
        $this->model->question = $request->get('question');
        $this->model->rate = $request->get('rate');
        $this->model->book_id = $request->get('book_id');
        $this->model->session_id = $request->get('session_id');
        $this->model->save();

        $options = (new OptionRepository())->next($request,$this->model);
        $result = (new AnswerRepository())->next($request,$this->model,$options);
        return $result;

    }

    /**
     * get all Questions   [-_-']
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function all()
    {
        return $this->model->with(['book','session','options','answers'])->get();
    }

    /**
     * Get Questions By Id  [*_*]
     * @param $question
     * @return mixed
     */
    public function getById($question)
    {
        return $this->model->where('id',$question)->with(['book','session','options','answers'])->first();
    }

    public function update($request,$question)
    {
        $this->model = $question = $this->getById($question);
        if(!empty($question)){
            (new AnswerRepository())->delete($this->model->answers);
            (new AnswerRepository())->delete($this->model->options);

            $this->model->question = $request->get('question');
            $this->model->rate = $request->get('rate');
            $this->model->book_id = $request->get('book_id');
            $this->model->session_id = $request->get('session_id');
            $this->model->save();

            $options = (new OptionRepository())->next($request,$this->model);
            $result = (new AnswerRepository())->next($request,$this->model,$options);
            return $result;
        }
        return false;

    }
    /**
     * Get Model By Id  [^_^]
     * @param $id
     * @return mixed
     */
    private function getModel($id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function count()
    {
        return Question::count();
    }


}