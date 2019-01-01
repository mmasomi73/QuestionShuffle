<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Grade\StoreGradeRequest;
use App\Http\Requests\Admin\Session\StoreSessionRequest;
use App\Http\Requests\Admin\Session\UpdateSessionRequest;
use App\Repositories\BookRepository;
use App\Repositories\GradeRepository;
use App\Repositories\SessionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function index(BookRepository $bookRepository, SessionRepository $repository){
        $sessions = $repository->all();
        $books = $bookRepository->all();
        return view('admin.session.index',compact('books','sessions'));
    }

    /**
     * store grade
     * @param StoreSessionRequest $request
     * @param SessionRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreSessionRequest $request, SessionRepository $repository){

        try{
            \DB::beginTransaction();
            $repository->store($request);
            \DB::commit();
            return back()->with('success','فصل مورد نظر با موفقیت افزوده گردید.');
        }catch (\Exception $e){
            \DB::rollBack();
            return back()->with('error','خطا در ثبت اطلاعات');
        }
    }

    /**
     * edit grade page
     * @param $book
     * @param BookRepository $bookRepository
     * @param SessionRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($book, BookRepository $bookRepository, SessionRepository $repository){
        $session = $repository->getById($book);
        $books = $bookRepository->all();
        $grades = (new GradeRepository)->all();
        return view('admin.session.edit',compact('session','books','grades'));
    }

    /**
     * update grade
     * @param $grade
     * @param UpdateSessionRequest $request
     * @param SessionRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update($grade, UpdateSessionRequest $request , SessionRepository $repository){
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
