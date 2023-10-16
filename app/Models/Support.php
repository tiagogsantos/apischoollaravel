<?php

namespace App\Models;

use App\Models\Traits\UuidTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTraits;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'description',
        'status'
    ];

    public $statusOptions = [
        'P' => 'Pendente, aguardando professor!',
        'A' => 'Aguardando Aluno!',
        'C' => 'Finalizado / Concluído'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson ()
    {
        return $this->belongsTo(Lesson::class);
    }

}
