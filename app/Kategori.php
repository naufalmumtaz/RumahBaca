<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['judul', 'isi'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            if(empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }

    public function koleksi()
    {
        return $this->hasMany('App\Koleksi');
    }

    public function getCreatedAtAttribute() {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
