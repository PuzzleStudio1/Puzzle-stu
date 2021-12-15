<?php

namespace App\Imports;

use App\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class oldUsersImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $user) {
            DB::table('old_users')->insert([
                ['username' => $user[0]],
            ]);
        }
    }
}
