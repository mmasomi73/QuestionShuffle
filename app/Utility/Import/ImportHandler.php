<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 1/18/2019
 * Time: 22:14
 */

namespace App\Utility\Import;


use App\Utility\Import\Excel\QuestionImporter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportHandler {

	private function handler(Request $request) {

		if(in_array($request->file('file')->getClientOriginalExtension(),['xlsx','xls']))
			return $this->excelHandler($request);

		return false;
	}

	private function excelHandler(Request $request) {
		return Excel::import(new QuestionImporter, $request->file('file'));
	}
	
	public function import(Request $request) {
		return $this->handler($request);
	}
}