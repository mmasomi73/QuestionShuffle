<?php
/**
 * Created by PhpStorm.
 * User: mma
 * Date: 1/2/2019
 * Time: 17:58
 */

namespace App\Utility\Exports;


use App\Utility\Exports\Word\SessionalQuestionsExport;

class ExportHandler
{
    private $request;
    private $questions;

    public function __construct($questions, $request)
    {
        $this->request = $request;
        $this->questions = $questions;
    }

    private function handler()
    {
        $config = [];
        $config['quantity'] = intval($this->request->get('quantity')) > 0 ? intval($this->request->get('quantity')):0;
        $config['number'] = intval($this->request->get('number')) > 0 ? intval($this->request->get('number')):0;

        if($config['quantity'] == 0 || $config['number'] == 0) return false;

        if(empty($this->request->get('format'))) return false;

        $config['format'] = $this->request->get('format') ==  'excel' ? 'excel':'word';
        $config['source'] = count($this->questions);
        $config['shuffle'] = $this->request->get('shuffle') == 1 ? true : false;
        $config['font'] = $this->request->get('font');
        if($config['number'] > $config['source']) $config['number'] = $config['source'];

        if ($config['format'] == 'excel') return $this->excelHandler($config);
        else return $this->wordHandler($config);
    }

    private function excelHandler(array $config)
    {

    }

    private function wordHandler(array $config)
    {
        $questions = $this->questions->shuffle()->pluck('id')->toArray();
        $qKey = array_rand($questions,$config['number']);
        $ids = [];
        foreach ($qKey as $key){
            $ids[]= $questions[$key];
        }
        for ($i = 0;$i < $config['quantity'];$i++){
            $uniqueKey = randomString(5);
            $handler = new SessionalQuestionsExport($ids,$uniqueKey,$config);
            $handler->download();
        }

    }

    public function downloader()
    {
        return $this->handler();
    }
}