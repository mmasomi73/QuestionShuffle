<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Book\StoreBookRequest;
use App\Http\Requests\Admin\Book\UpdateBookRequest;
use App\Repositories\BookRepository;
use App\Repositories\GradeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(BookRepository $repository, GradeRepository $gradeRepository){
        $books = $repository->all();
        $grades = $gradeRepository->all();
        return view('admin.book.index',compact('books','grades'));
    }

    /**
     * store grade
     * @param StoreGradeRequest $request
     * @param GradeRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreBookRequest $request, BookRepository $repository){

        try{
            \DB::beginTransaction();
            $repository->store($request);
            \DB::commit();
            return back()->with('success','کتاب مورد نظر با موفقیت افزوده گردید.');
        }catch (\Exception $e){
            \DB::rollBack();
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }

    /**
     * edit grade page
     * @param $book
     * @param BookRepository $repository
     * @param GradeRepository $gradeRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($book, BookRepository $repository, GradeRepository $gradeRepository){
        $book = $repository->getById($book);
        $grades = $gradeRepository->all();
        return view('admin.book.edit',compact('book','grades'));
    }

    /**
     * update grade
     * @param $grade
     * @param UpdateGradeRequest $request
     * @param GradeRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update($grade, UpdateBookRequest $request , BookRepository $repository){
        try{
            \DB::beginTransaction();
            $result = $repository->update($request, $grade);
            \DB::commit();
            if($result)
                return back()->with('success','فصل مورد نظر با موفقیت افزوده گردید.');
            return back()->with('error','فصل برای ویرایش یافت نشد.');
        }catch (\Exception $e){
            \DB::rollBack();
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }
}
