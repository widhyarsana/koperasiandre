<?php

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Penghasilan dalam sebulan',
                'value' => 40
            ],
            [
                'name' => 'Jenis Pekerjaan',
                'value' => 25
            ],
            [
                'name' => 'Hutang',
                'value' => 10
            ],
            [
                'name' => 'Anggota Keluarga',
                'value' => 10
            ],
            [
                'name' => 'Jaminan',
                'value' => 15
            ],
        ];

        foreach($data as $item){
            $criteria = Criteria::create($item);
        }

    }
}
