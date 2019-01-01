<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Grade\StoreGradeRequest;
use App\Repositories\GradeRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index(GradeRepository $gradeRepository, QuestionRepository $repository){
        $questions = $repository->all();
        $grades = $gradeRepository->all();
        return view('admin.question.index',compact('questions','grades'));
    }

    /**
     * store question
     * @param Request $request
     * @param QuestionRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request, QuestionRepository $repository){

        try{
            \DB::beginTransaction();
            $repository->store($request);
            \DB::commit();
            return back()->with('success','سوال مورد نظر با موفقیت افزوده گردید.');
        }catch (\Exception $e){
            \DB::rollBack();
            dd($e);
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }

    /**
     * edit question page
     * @param $question
     * @param GradeRepository $gradeRepository
     * @param QuestionRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($question, GradeRepository $gradeRepository, QuestionRepository $repository){
        $question = $repository->getById($question);
        $grades = $gradeRepository->all();
        return view('admin.question.edit',compact('question','grades'));
    }

    public function update($question, Request $request , QuestionRepository $repository){
        try{
            \DB::beginTransaction();
            $result = $repository->update($request, $question);
            \DB::commit();
            if($result)
                return back()->with('success','سوال مورد نظر با موفقیت ویرایش گردید.');
            return back()->with('error','سوال برای ویرایش یافت نشد.');
        }catch (\Exception $e){
            \DB::rollBack();
            dd($e);
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }
}
