<?php

namespace DonorDarahPMI;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Str;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['password', 'email', 'role'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return Str::upper($this->role) == Str::upper($role);
    }

    public function adminPusat()
    {
        return $this->hasOne(AdminPusat::class);
    }

    public function adminDaerah()
    {
        return $this->hasOne(AdminDaerah::class);
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

}
