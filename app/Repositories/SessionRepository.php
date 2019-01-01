<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 12/31/2018
 * Time: 17:22
 */

namespace App\Repositories;


use App\Session;

class SessionRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Session();
    }

    /**
     * Store Session  [^_^]
     * @param $request
     */
    public function store($request)
    {
        $this->model->name = $request->get('name');
        $this->model->book_id = $request->get('book_id');
        $this->model->save();
    }

    /**
     * Update Session  [^_^]
     * @param $request
     * @param $session
     * @return bool
     */
    public function update($request, $session)
    {
        $this->model = $this->getModel($session);
        if(!empty($session)){
            $this->model->name = $request->get('name');
            $this->model->book_id = $request->get('book_id');
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
     * Get Session By Id  [*_*]
     * @param $session
     * @return mixed
     */
    public function getById($session)
    {
       return $this->model->where('id',$session)->with(['book','questions'])->first();
    }

    /**
     * get all Sessions   [-_-']
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function all()
    {
        return $this->model->with(['book','questions'])->get();
    }
}