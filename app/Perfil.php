<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;
use pen\User;

class Perfil extends Model
{
	protected $primaryKey = 'perfil_id';
	protected $fillable = ['perfil', 'descripcion'];

	public function users() {
		return $this->belongsToMany(User::class)->withTimestamps();;
	}

}
