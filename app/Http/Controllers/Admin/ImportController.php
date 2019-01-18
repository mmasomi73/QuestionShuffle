<?php

namespace App\Http\Controllers\Admin;

use App\Utility\Import\ImportHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    //
	public function index() {
		return view('admin.import.index');
	}

	public function import(Request $request) {
		(new ImportHandler)->import($request);
		return back()->with('success','سوال مورد نظر با موفقیت افزوده گردید.');
	}
}
