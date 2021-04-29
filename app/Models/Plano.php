<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'url',
        'preco',
        'descricao',
    ];

    public function pesquisar($filtro = null)
    {
        return $this
            ->where('nome', 'LIKE', "%{$filtro}%")
            ->orWhere('descricao', 'LIKE', "%{$filtro}%")
            ->paginate();
    }
}
