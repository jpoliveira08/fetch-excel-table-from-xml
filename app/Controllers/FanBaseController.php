<?php

namespace AllBlacksRugby\FanBase\Controllers;

use AllBlacksRugby\FanBase\Repositories\FanBaseRepositoryXlsx;
use AllBlacksRugby\FanBase\Services\FanBaseService;

class FanBaseController extends Controller
{
    private $fanBaseRepository;
    private $fanBaseService;

    public function __construct()
    {
        $this->fanBaseRepository = new FanBaseRepositoryXlsx();
        $this->fanBaseService = new FanBaseService();
    }

    public function index()
    {
        $dataFromXml = $this->fanBaseRepository->getAllFans();
        $htmlTable = $this->fanBaseService->buildTable($dataFromXml);

        return $this->view('./public/fanbase/index', [
            'htmlTable' => $htmlTable
        ]);
    }

    public function upload()
    {
        return $this->view('./public/fanbase/import');
    }

    public function downloadXlsxFile()
    {
        $this->fanBaseRepository->getXlsxFile();
    }

    public function update()
    {
        $xml = '';

        if (isset($_FILES['xml-file']) && ($_FILES['xml-file']['error'] == UPLOAD_ERR_OK)) {
            $xml = simplexml_load_file($_FILES['xml-file']['tmp_name']);                        
        }

        $jsonFromXml = json_encode($xml);
        $xmlData = json_decode($jsonFromXml, true);

        $this->fanBaseRepository->update($xmlData);
    }
}