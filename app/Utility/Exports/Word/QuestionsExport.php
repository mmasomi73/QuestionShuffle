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
        $section = $phpWord->addSection();


        $styleCenter = array('rtl' => true, 'name' => 'B Mitra', 'size' => 12, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'valign' => 'center');
        $styleRight = array('rtl' => true, 'name' => 'B Mitra', 'size' => 12, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END, 'valign' => 'center');
        $borderStyle = array('borderSize' => 6, 'borderColor' => '000000', 'rtl' => true, 'name' => 'B Mitra', 'size' => 12, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END, 'valign' => 'center');
        $table = $section->addTable($borderStyle);
        $i = 0;

        $table->addRow(1);
        $table->addCell(500)->addText('ردیف', $styleCenter);
        $cell = $table->addCell(11000);
        $cell->addText('سوالات' , $styleRight);
        $table->addCell(500)->addText('بارم', $styleCenter);

        foreach ($questions as $question) {
            $table->addRow();
            $table->addCell(500)->addText(++$i, $styleCenter);
            $cell = $table->addCell(11000);
            $cell->addText($question->question , $styleRight);
            foreach ($question->options as $option) {
                $cell->addText(getOption($option->option) . $option->text, $styleRight);
            }
            $table->addCell(500)->addText('1', $styleCenter);
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