<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function query()
    {
        return User::query();
    }
}
