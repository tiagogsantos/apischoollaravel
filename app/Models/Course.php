<?php

namespace App\Models;

use App\Models\Traits\UuidTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, UuidTraits;

    protected $table = 'course';
    protected $primaryKey = 'id';

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    // Todos os modulos do curso = 1 para muitos
    public function modules ()
    {
        return $this->hasMany(Module::class);
    }
}
