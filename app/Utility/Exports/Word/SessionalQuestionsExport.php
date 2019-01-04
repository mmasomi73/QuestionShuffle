<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 1/1/2019
 * Time: 21:52
 */

namespace App\Utility\Exports\Word;


use App\Repositories\QuestionRepository;

class SessionalQuestionsExport
{

    private $questions;
    private $uniqueKey;

    public function __construct(array $keys,$uniqueKey)
    {
        $this->questions = (new QuestionRepository())->getByIds($keys);
        $this->uniqueKey = $uniqueKey;


        $this->questions = $this->questions->shuffle();
        $this->questions = $this->questions->shuffle();
        $this->questions = $this->questions->shuffle();
        $this->questions = $this->questions->shuffle();
        $this->questions = $this->questions->shuffle();
    }

    /**
     * @return mixed
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function download()
    {
        $questions = $this->questions;
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection(array(
            'marginLeft'   => 500,
            'marginRight'  => 500,
            'marginTop'    => 500,
            'marginBottom' => 500,
            'headerHeight' => 50,
            'footerHeight' => 50,
        ));

        $styleCode = array(
            'rtl' => true,
            'name' => 'Letter Gothic Std',
            'size' => 10
        );
        $style = array('rtl' => true,
                       'name' => 'B Mitra',
                       'size' => 12);

        $borderStyle = array('borderSize' => 6,
                            'borderColor' => '000000');

        $table = $section->addTable($borderStyle);
        $cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
        $cellHEnd = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END);
        $cellVCentered = array('valign' => 'center');
        $i = 0;

        //--------------= Questions Header
        $table->addRow();
        $cell = $table->addCell(500,$cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('ردیف', $style);

        $cell = $table->addCell(11000);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($this->uniqueKey, $styleCode);

        $cell = $table->addCell(500,$cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('بارم', $style);

        $shuffledOptions = $this->shuffleOptions();
        //--------------= Questions
        foreach ($questions as $question) {
            $table->addRow();
            //--------------= Rows Number Column
            $cell = $table->addCell(500,$cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText(++$i, $style);

            //--------------= Rows Number Column
            $cell = $table->addCell(11000);
            $textrun = $cell->addTextRun($cellHEnd);
            $textrun->addText($question->question , $style);

            $sortedOps = $shuffledOptions[$question->id];
            asort($sortedOps);
            foreach ($sortedOps as $oid => $option) {
                $textrun->addTextBreak();
                $opText = $question->options->where('option',$oid)->first();
                $textrun->addText(getOption($option) .$opText->text, $style);
            }
            //--------------= Rows Number Column
            $cell = $table->addCell(500,$cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText('1', $style);
        }

        $section->addTextBreak();

        //--------------= Answers Table
        $answerBorderStyle = array('borderSize' => 6,
                            'borderColor' => '000000',
                            'bgColor'=>'cecece'
                        );
        $table = $section->addTable($answerBorderStyle);
        $i = 0;
        foreach ($questions as $question) {
            $table->addRow();
            //--------------= Rows Number Column
            $cell = $table->addCell(500,$cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText(++$i, $style);

            //--------------= Answer Column
            $cell = $table->addCell(900,$cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText(getOption($shuffledOptions[$question->id][$question->answers->first()->option]), $style);
//            $textrun->addText(getOption($question->answers->first()->option), $style);
        }

        $file = randomString(12).'.docx';
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        return $objWriter->save('Exports'.DIRECTORY_SEPARATOR.$file);
    }

    public function shuffleOptions() : array
    {
        $options = [];
        $back_arr = [];
        //--------------= Get Options & Answers
        foreach ($this->questions as $question) {
            foreach ($question->options as $option) {
                $back_arr[$question->id][$option->option] = $options[$question->id][$option->option] = $option->option;
            }
        }

        //--------------= Shuffle Options
        foreach ($options as $key => $option){
            shuffle($option);
            shuffle($option);
            shuffle($option);
            $options[$key] = $option;
        }
        $final_arr = [];

        //--------------= Create Shuffled Options
        foreach ($back_arr as $id => $option){
            $ae = 0;
            foreach ($option as  $key => $item){
                $final_arr[$id][$key] = $options[$id][$ae++];
            }
        }
        
        return $final_arr;
    }
}