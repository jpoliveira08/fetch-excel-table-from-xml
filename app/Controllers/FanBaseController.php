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
}