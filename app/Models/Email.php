<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
	protected $table = 'email';
	protected $guarded = [];
	protected $fillable = [
		'pemilik',
		'judul'
	];
	public function siswa(){
		return $this->belongsTo(Siswa::class);
	}
}