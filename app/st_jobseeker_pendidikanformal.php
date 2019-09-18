<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class st_jobseeker_pendidikanformal extends Model
{
    protected $table = 'st_jobseeker_pendidikanformal';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
      'id','user_id','tingkat_pendidikan','tanggal_mulai','tanggal_akhir','institusi','tempat','fakultas','jurusan','IPK','keterangan'
      ];
  
    public function user_id(){
      return $this->hasOne('App\md_jobseeker','id','users_id');
    }

    public function st_tingkatpendidikan(){
      return $this->hasOne('App\st_Tingkatpendidikan','id','tingkat_pendidikan');
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
