<?php

namespace pen\Imports;

use pen\Tema;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportTema implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tema([
            //
        ]);
    }
}
