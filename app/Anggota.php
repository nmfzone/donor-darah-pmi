<?php

namespace DonorDarahPMI;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = 'anggota';

    protected $fillable = ['name', 'age', 'job', 'address', 'city', 'province', 'mobilePhone', 'banned'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

} 