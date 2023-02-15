<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'title'     => $row['name'],
            'first_name'    => $row['first_name'], 
            'last_name'    => $row['last_name'],
            'mobile_number'    => $row['mobile_number'],
            'company_name'    => $row['company_name'],
        ]);
    }
}
