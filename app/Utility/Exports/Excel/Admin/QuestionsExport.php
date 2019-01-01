<?php

namespace App\Utility\Exports\Excel\Admin;

use App\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class QuestionsExport implements FromView, WithEvents
{
    private $counter;
    public function __construct($counter = 100)
    {
        $this->counter = $counter;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        $this->counter = (new QuestionRepository())->count() + 1;
        return view('exports.excel.normal', [
            'questions' => (new QuestionRepository())->all()
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '0000000'],
                        ],
                    ],
                ];
                $event->sheet->setRightToLeft(true);
                $event->sheet->getStyle("A1:Z1000")->getFont()->setName('W_mitra');
                $event->sheet->getStyle("A1:Z1000")->getFont()->setSize(10);
                $event->sheet->getStyle("A1:Z1000")->getAlignment()->setHorizontal('center');
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                foreach (range('A','J') as $col) {
                    foreach (range(0,$this->counter) as $row) {
                        $event->sheet->getStyle($col.$row)->applyFromArray($styleArray);
                    }
                }
                foreach (range('B','G') as $col) {
                    foreach (range(0,$this->counter) as $row) {
                        $event->sheet->getStyle($col.$row)->getAlignment()->setHorizontal('right');
                    }
                }
//                $event->sheet->getDefaultStyle()->applyFromArray($styleArray);

            },
        ];
    }
}
