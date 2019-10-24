<?php

namespace App\Imports;

use App\User;
use App\md_jobseeker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobseekerImport implements ToCollection, WithHeadingRow
{
    private function insertData($row) {
        
        try {
            $user = new User();
            $user->name = $row['nama_lengkap'];
            $user->email = $row['email'];
            $user->password = \Hash::make('111111');
            $user->save();

            $jobseeker = new md_jobseeker();
            $jobseeker->users_id = $user->id;
            $jobseeker->nama_lengkap = $row['nama_lengkap'];
            $jobseeker->NIK = $row['nik'];
            $jobseeker->tempat_lahir = $row['tempat_lahir'];
            $jobseeker->tanggal_lahir = $row['tanggal_lahir'];
            $jobseeker->jenis_kelamin = $row['jenis_kelamin'];
            $jobseeker->agama = $row['agama'];
            $jobseeker->alamat_ktp = $row['alamat_ktp'];
            $jobseeker->nohp = $row['nohp'];
            $jobseeker->alasan_melamar = $row['alasan_melamar'];           
            $jobseeker->radio_bersedia_sift = $row['radio_bersedia_sift'];           
            $jobseeker->radio_bersedia_mutasi = $row['radio_bersedia_mutasi'];           
            $jobseeker->alasan_mutasi = $row['alasan_mutasi'];           
            $jobseeker->alasan_sift = $row['alasan_sift'];           
            $jobseeker->save();   
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $this->insertData($row);
        }
    }

    private function returnMessage($status, $message, $data) {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}
