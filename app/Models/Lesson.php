<?php

namespace App\Models;

use App\Models\Traits\UuidTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = ['name', 'description', 'video'];


    // Varios support para 1 usuário
    public function supports ()
    {
        return $this->hasMany(Support::class);
    }

}
