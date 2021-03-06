<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 1/1/2019
 * Time: 21:52
 */

namespace App\Utility\Exports\Word;


use App\Repositories\QuestionRepository;

class QuestionsExport
{

    private $questions;

    public function __construct()
    {
        $this->questions = (new QuestionRepository())->all();
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
        $textrun = $cell->addTextRun($cellHEnd);
        $textrun->addText('سوالات', $style);

        $cell = $table->addCell(500,$cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('بارم', $style);

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
            foreach ($question->options as $option) {
                $textrun->addTextBreak();
                $textrun->addText(getOption($option->option) . $option->text, $style);
            }
            //--------------= Rows Number Column
            $cell = $table->addCell(500,$cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText('1', $style);
        }

        $file = 'Questions.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        return $xmlWriter->save("php://output");
    }
}