<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 12/31/2018
 * Time: 17:22
 */

namespace App\Repositories;


use App\Grade;

class GradeRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Grade();
    }

    /**
     * Store Grade  [^_^]
     * @param $request
     */
    public function store($request)
    {
        $this->model->name = $request->get('name');
        $this->model->slug = $request->get('slug');
        $this->model->save();
    }

    /**
     * Update Grade  [^_^]
     * @param $request
     * @param $grade
     * @return bool
     */
    public function update($request, $grade)
    {
        $this->model = $this->getModel($grade);
        if(!empty($grade)){
            $this->model->name = $request->get('name');
            $this->model->slug = $request->get('slug');
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
     * Get Grade By Id  [*_*]
     * @param $grade
     * @return mixed
     */
    public function getById($grade)
    {
       return $this->model->where('id',$grade)->with(['books','books.sessions','books.sessions.questions'])->first();
    }

    /**
     * get all grades   [-_-']
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function all()
    {
        return $this->model->with(['books','books.sessions','books.sessions.questions'])->get();
    }

    public function count()
    {
        return Grade::count();
    }
}