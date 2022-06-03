<?php

namespace Database\Seeders;

use App\Models\AKP\Pekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'BELUM/TIDAK BEKERJA',
            'MENGURUS RUMAH TANGGA',
            'PELAJAR/MAHASISWA',
            'PENSIUNAN',
            'PEGAWAI NEGERI SIPIL (PNS)',
            'TENTARA NASIONAL INDONESIA (TNI)',
            'KEPOLISIAN RI (POLRI)',
            'PERDAGANGAN',
            'PETANI/PEKEBUN',
            'PETERNAK',
            'NELAYAN/PERIKANAN',
            'INDUSTRI',
            'KONSTRUKSI',
            'TRANSPORTASI',
            'KARYAWAN SWASTA',
            'KARYAWAN BUMN',
            'KARYAWAN BUMD',
            'KARYAWAN HONORER',
            'BURUH HARIAN LEPAS',
            'BURUH TANI/PERKEBUNAN',
            'BURUH NELAYAN/PERIKANAN',
            'BURUH PETERNAKAN',
            'PEMBANTU RUMAH TANGGA',
            'TUKANG CUKUR',
            'TUKANG LISTRIK',
            'TUKANG BATU',
            'TUKANG KAYU',
            'TUKANG SOL SEPATU',
            'TUKANG LAS/PANDAI BESI',
            'TUKANG JAHIT',
            'TUKANG GIGI',
            'PENATA RIAS',
            'PENATA BUSANA',
            'PENATA RAMBUT',
            'MEKANIK',
            'SENIMAN',
            'TABIB',
            'PARAJI',
            'PERANCANG BUSANA',
            'PENTERJEMAH',
            'IMAM MASJID',
            'PENDETA',
            'PASTOR',
            'WARTAWAN',
            'USTADZ/MUBALIGH',
            'JURU MASAK',
            'PROMOTOR ACARA',
            'ANGGOTA DPR-RI',
            'ANGGOTA DPD',
            'ANGGOTA BPK',
            'PRESIDEN',
            'WAKIL PRESIDEN',
            'ANGGOTA MAHKAMAH KONSTITUSI',
            'ANGGOTA KABINET KEMENTERIAN',
            'DUTA BESAR',
            'GUBERNUR',
            'WAKIL GUBERNUR',
            'BUPATI',
            'WAKIL BUPATI',
            'WALIKOTA',
            'WAKIL WALIKOTA',
            'ANGGOTA DPRD PROVINSI',
            'ANGGOTA DPRD KABUPATEN/KOTA',
            'DOSEN',
            'GURU',
            'PILOT',
            'PENGACARA',
            'NOTARIS',
            'ARSITEK',
            'AKUNTAN',
            'KONSULTAN',
            'DOKTER',
            'BIDAN',
            'PERAWAT',
            'APOTEKER',
            'PSIKIATER/PSIKOLOG',
            'PENYIAR TELEVISI',
            'PENYIAR RADIO',
            'PELAUT',
            'PENELITI',
            'SOPIR',
            'PIALANG',
            'PARANORMAL',
            'PEDAGANG',
            'PERANGKAT DESA',
            'KEPALA DESA',
            'BIARAWATI',
            'WIRASWASTA',
            'LAINNYA',

        ];

        foreach ($data as $item) {
            Pekerjaan::create(['nama' => $item]);
        }
    }
}