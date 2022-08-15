<?php

declare(strict_types=1);

namespace AllBlacksRugby\FanBase\Services;

use Shuchkin\SimpleXLSX;

class FanBaseService
{
    public function buildTable($data)
    {
        $htmlTable = '';
        if ($data) {
            $htmlTable .= '<table border="1" cellpadding="1" style="border-collapse: collapse">';
            foreach( $data->rows() as $r ) {
                $htmlTable .= '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
            }
            $htmlTable .= '</table>';
        } else {
            echo SimpleXLSX::parseError();
        }

        return $htmlTable;
    }
}
