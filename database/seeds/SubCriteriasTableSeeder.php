<?php

use App\Models\SubCriteria;
use Illuminate\Database\Seeder;

class SubCriteriasTableSeeder extends Seeder
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
                'name' => 'penghasilan lebih dari lima juta',
                'value' => 100,
                'criteria_id' => 1
            ],
            [
                'name' => 'penghasilan  terhitung dari tiga sampai dengan lima juta',
                'value' => 80,
                'criteria_id' => 1
            ],
            [
                'name' => 'penghasilan terhitung dari satu sampai dengan kurang dari tiga juta',
                'value' => 60,
                'criteria_id' => 1
            ],
            [
                'name' => 'penghasilan terhitung kurang dari satu juta',
                'value' => 40,
                'criteria_id' => 1
            ],
            [
                'name' => 'tidak berpenghasilan',
                'value' => 0,
                'criteria_id' => 1
            ],
            [
                'name' => 'berprofesi sebagai Pegawai Negeri Sipil',
                'value' => 100,
                'criteria_id' => 2
            ],
            [
                'name' => 'berprofesi sebagai Wiraswasta',
                'value' => 80,
                'criteria_id' => 2
            ],
            [
                'name' => 'berprofesi sebagai Karyawan Swasta',
                'value' => 60,
                'criteria_id' => 2
            ],
            [
                'name' => 'tidak memiliki pekerjaan',
                'value' => 0,
                'criteria_id' => 2
            ],
            [
                'name' => 'tidak memiliki hutang atau kisaran dibawah satu juta',
                'value' => 100,
                'criteria_id' => 3
            ],
            [
                'name' => 'memiliki hutang dari rentang satu juta sampai dengan lima juta',
                'value' => 80,
                'criteria_id' => 3
            ],
            [
                'name' => 'memiliki hutang dari kisaran lebih dari lima juta sampai dengan 10 juta',
                'value' => 60,
                'criteria_id' => 3
            ],
            [
                'name' => 'memiliki hutang lebih dari 10 juta',
                'value' => 0,
                'criteria_id' => 3
            ],
            [
                'name' => 'tidak mempunyai tanggungan anggota keluarga ',
                'value' => 100,
                'criteria_id' => 4
            ],
            [
                'name' => 'mempunyai tanggungan anggota keluarga pada kisaran jumlah satu  sampai tiga anggota',
                'value' => 80,
                'criteria_id' => 4
            ],
            [
                'name' => 'memiliki tanggungan anggota keluarga lebih dari tiga anggota',
                'value' => 20,
                'criteria_id' => 4
            ],
            [
                'name' => 'memiliki jaminan berupa surat tanah atau sertifikat tanah ',
                'value' => 100,
                'criteria_id' => 5
            ],
            [
                'name' => 'peminjam memiliki jaminan berupa BPKB Mobil atau kendaraan roda empat ',
                'value' => 80,
                'criteria_id' => 5
            ],
            [
                'name' => 'peminjam memiliki jaminan berupa BPKB Sepeda motor  atau kendaraan roda dua',
                'value' => 60,
                'criteria_id' => 5
            ],
        ];

        foreach ($data as $item) {
            $subCriteria = SubCriteria::create($item);
        }
    }
}
