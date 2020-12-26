<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description','full-access',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function permisos(){
        return $this->belongsToMany(Permiso::class)->withTimesTamps();
    }
}
