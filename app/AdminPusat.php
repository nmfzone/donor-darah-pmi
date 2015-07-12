<?php

namespace DonorDarahPMI;

use Illuminate\Database\Eloquent\Model;

class AdminPusat extends Model
{
	protected $table = 'adminPusat';

    protected $fillable = ['name', 'province'];

    public function subordinate()
    {
        return $this->hasMany(AdminDaerah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

} 