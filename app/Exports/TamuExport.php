<?php

namespace App\Exports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;
    protected $status;

    public function __construct($startDate, $endDate, $status)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }

    public function collection()
    {

        $query = Tamu::query()->whereBetween('tanggal_kunjungan', [$this->startDate, $this->endDate]);

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query->get([
            'name',
            'alamat',
            'no_telp',
            'profesi',
            'instansi',
            'tanggal_kunjungan',
            'waktu_kunjungan',
            'tujuan',
            'nama_tujuan_tamu',
            'status',
            'last_status_change',
        ]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alamat',
            'Nomor Telepon',
            'Profesi',
            'Instansi',
            'Tanggal Kunjungan',
            'Waktu Kunjungan',
            'Tujuan',
            'Bertemu Dengan',
            'Status',
            'Terakhir Diubah',
        ];
    }
}
