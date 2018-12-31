<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Grade\StoreGradeRequest;
use App\Repositories\GradeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index(GradeRepository $repository){
        $grades = $repository->all();
        return view('admin.grade.index',compact('grades'));
    }

    /**
     * store grade
     * @param StoreGradeRequest $request
     * @param GradeRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreGradeRequest $request, GradeRepository $repository){

        try{
            \DB::beginTransaction();
            $repository->store($request);
            \DB::commit();
            return back()->with('success','پایه مورد نظر با موفقیت افزوده گردید.');
        }catch (\Exception $e){
            \DB::rollBack();
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }

    public function edit(){

    }

    public function update(){

    }

    public function remove(){

    }
}
