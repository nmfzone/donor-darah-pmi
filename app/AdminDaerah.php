<?php

namespace DonorDarahPMI;

use Illuminate\Database\Eloquent\Model;

class AdminDaerah extends Model
{
	protected $table = 'adminDaerah';

    protected $fillable = ['name', 'city'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

} 