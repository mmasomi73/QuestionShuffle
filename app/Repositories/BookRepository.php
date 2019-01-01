<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 12/31/2018
 * Time: 17:22
 */

namespace App\Repositories;


use App\Book;

class BookRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Book();
    }

    /**
     * Store Book  [^_^]
     * @param $request
     */
    public function store($request)
    {
        $this->model->name = $request->get('name');
        $this->model->grade_id = $request->get('grade_id');
        $this->model->save();
    }

    /**
     * Update Book  [^_^]
     * @param $request
     * @param $book
     * @return bool
     */
    public function update($request, $book)
    {
        $this->model = $this->getModel($book);
        if(!empty($book)){
            $this->model->name = $request->get('name');
            $this->model->grade_id = $request->get('grade_id');
            $this->model->save();
            return true;
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

    /**
     * Get Book By Id  [*_*]
     * @param $book
     * @return mixed
     */
    public function getById($book)
    {
       return $this->model->where('id',$book)->with(['grade','sessions','sessions.questions'])->first();
    }

    /**
     * get all Books   [-_-']
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function all()
    {
        return $this->model->with(['grade','sessions','sessions.questions'])->get();
    }

    public function count()
    {
        return Book::count();
    }
}