<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class st_jobseeker_pengalamankerja extends Model
{
    protected $table = 'st_jobseeker_pengalamankerja';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
      'user_id','nama_perusahaan','bisnis_perusahaan','lokasi_kerja','tanggal_mulai','tanggal_akhir','posisi','bawahan','gaji_terakhir','jurusan','alasan_pindah','keterangan'
      ];
  
    public function user_id(){
      return $this->hasOne('App\md_jobseeker','id','users_id');
    }

    public function st_bisnisperusahaan(){
      return $this->hasOne('App\st_Bisnisperusahaan','id','bisnis_perusahaan');
    }

    protected static function boot(){
      parent::boot();
      static::creating(function ($model) {
          try {
              $model->id = Uuid::uuid4()->toString();
          } catch (UnsatisfiedDependencyException $e) {
              abort(500, $e->getMessage());
          }
      });
    }
    
}
