<?php

declare(strict_types=1);

namespace AllBlacksRugby\FanBase\Repositories;

use Shuchkin\SimpleXLSX;

class FanBaseRepositoryXlsx
{
    public function getAllFans()
    {
        $allRecordsFromXlsx = SimpleXLSX::parse(__DIR__ . '/clientes.xlsx');

        if ($allRecordsFromXlsx) {
            return $allRecordsFromXlsx;
        }

        return SimpleXLSX::parseError();
    }

    public function getXlsxFile()
    {
        $file = "clientes.xlsx";

        ob_end_clean();

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        readfile(__DIR__ . '/clientes.xlsx');

        return;
    }
}

