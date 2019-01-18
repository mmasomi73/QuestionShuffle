<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 1/18/2019
 * Time: 22:15
 */

namespace App\Utility\Import\Excel;

use App\Answer;
use App\Option;
use App\Question;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionImporter implements ToCollection {
	public function collection(Collection $rows)
	{
		foreach ($rows as $key => $row)
		{
			if($key != 0){
				try{
					\DB::beginTransaction();
					//--------------= Save Question
					$question = new Question();
					$question->book_id = $row[0];
					$question->session_id = $row[1];
					$question->question = $row[2];
					$question->rate = $row[9];
					$question->save();

					//--------------= Save Options
					$opt_a = $this->setOptions($row[3],$question->id,'a');
					$opt_b = $this->setOptions($row[4],$question->id,'b');
					$opt_c = $this->setOptions($row[5],$question->id,'c');
					$opt_d = $this->setOptions($row[6],$question->id,'d');

					//--------------= Save Answer
					if($row[7] == 'a') $this->setAnswer($row[8],$opt_a->id,$question->id,'a');
					elseif($row[7] == 'b') $this->setAnswer($row[8],$opt_b->id,$question->id,'b');
					elseif($row[7] == 'c') $this->setAnswer($row[8],$opt_c->id,$question->id,'c');
					else $this->setAnswer($row[8],$opt_d->id,$question->id,'d');
					\DB::commit();
				}catch (\Exception $e){
					\DB::rollBack();
				}
			}


		}
	}

	private function setOptions($text,$questionId,$opt = 'a') {
		$option = new Option();
		$option->text = $text;
		$option->option = $opt;
		$option->question_id = $questionId;
		$option->save();
		return $option;
	}

	private function setAnswer($text,$optionId,$questionId, $opt = 'a') {
		$answer = new Answer();
		$answer->option = $opt;
		$answer->answer = $text;
		$answer->question_id = $questionId;
		$answer->option_id = $optionId;
		$answer->save();
		return $answer;
	}
}