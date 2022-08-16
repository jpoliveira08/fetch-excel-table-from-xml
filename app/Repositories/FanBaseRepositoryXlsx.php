<?php

declare(strict_types=1);

namespace AllBlacksRugby\FanBase\Repositories;

use Shuchkin\SimpleXLSX;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

        if (ob_get_contents()) {
            ob_end_clean();
        }
        ob_start();

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

    public function update($data)
    {
        ini_set('max_execution_time', '120');
        $inputFile = __DIR__ . '/clientes.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFile);

        $sheet = $spreadsheet->getActiveSheet();

        $writer = new Xlsx($spreadsheet);
        $row = $sheet->getHighestRow();
        $row++;

        foreach ($data['torcedor'] as $torcedor) {
            $sheet->insertNewRowBefore($row);
            $sheet->setCellValue('A' . $row, $torcedor['@attributes']['nome']);
            $sheet->setCellValue('B' . $row, $torcedor['@attributes']['documento']);
            $sheet->setCellValue('C' . $row, $torcedor['@attributes']['cep']);
            $sheet->setCellValue('D' . $row, $torcedor['@attributes']['endereco']);
            $sheet->setCellValue('E' . $row, $torcedor['@attributes']['bairro']);
            $sheet->setCellValue('F' . $row, $torcedor['@attributes']['cidade']);
            $sheet->setCellValue('G' . $row, $torcedor['@attributes']['uf']);
            $sheet->setCellValue('H' . $row, $torcedor['@attributes']['telefone'] ?? '');
            $sheet->setCellValue('I' . $row, $torcedor['@attributes']['email'] ?? '');
            $sheet->setCellValue('J' . $row, $torcedor['@attributes']['ativo'] == 1 ? 'SIM' : 'NÃO');

            $writer->save($inputFile);
            $row++;
        }
    }
}

