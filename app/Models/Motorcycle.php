<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;
    protected $table = 'motorcycles';
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
