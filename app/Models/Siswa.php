<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
	protected $table = 'siswa';
	protected $guarded = [];
	protected $fillable = [
		'nama',
		'alamat',
		'jenkel'
	];
	public function email(){
		return $this->hasMany(Email::class);
	}
}