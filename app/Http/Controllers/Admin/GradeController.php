<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Grade\StoreGradeRequest;
use App\Http\Requests\Admin\Grade\UpdateGradeRequest;
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

    /**
     * edit grade page
     * @param $grade
     * @param GradeRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($grade, GradeRepository $repository){
        $grade = $repository->getById($grade);
        return view('admin.grade.edit',compact('grade'));
    }

    /**
     * update grade
     * @param $grade
     * @param UpdateGradeRequest $request
     * @param GradeRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update($grade, UpdateGradeRequest $request , GradeRepository $repository){
        try{
            \DB::beginTransaction();
            $result = $repository->update($request, $grade);
            \DB::commit();
            if($result)
                return back()->with('success','پایه مورد نظر با موفقیت افزوده گردید.');
            return back()->with('error','پایه برای ویرایش یافت نشد.');
        }catch (\Exception $e){
            \DB::rollBack();
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }

    public function remove(){

    }
}
