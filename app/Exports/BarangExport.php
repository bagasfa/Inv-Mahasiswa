<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Barang;
use DB;

class BarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('barang')
            ->select('barang.id', 'ruangan.nama_ruangan', 'barang.nama_barang', 'barang.total', 'barang.broken', 'user1.nama_user as created_by', 'user2.nama_user as updated_by', 'barang.created_at', 'barang.updated_at')
            ->join('user as user1', 'user1.id', '=', 'barang.created_by')
            ->leftJoin('user as user2', 'user2.id', '=', 'barang.updated_by')
            ->join('ruangan', 'ruangan.id', '=', 'barang.id_ruangan')
            ->orderBy('barang.id')
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Ruangan',
            'Nama Barang',
            'Total Barang',
            'Barang Rusak',
            'Dibuat',
            'Diupdate',
            'Created_at',
            'Updated_at'
        ];
    }
}
