<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class st_jobseeker_pengalamanorganisasi extends Model
{
    protected $table = 'st_jobseeker_pengalamanorganisasi';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id','user_id','organisasi','tanggal_mulai','tanggal_akhir','tempat','posisi','keterangan'
      ];

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
