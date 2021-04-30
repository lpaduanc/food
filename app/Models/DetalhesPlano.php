<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalhesPlano extends Model
{
    use HasFactory;

    // relacionamento de que o detalhe pertence a um plano
    public function plano()
    {
        $this->belongsTo(Plano::class);
    }
}
