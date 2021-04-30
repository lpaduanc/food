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

    //faz o relacionamento de 1 para muitos
    public function detalhes()
    {
        return $this->hasMany(DetalhesPlano::class);
    }

    public function pesquisar($filtro = null)
    {
        return $this
            ->where('nome', 'LIKE', "%{$filtro}%")
            ->orWhere('descricao', 'LIKE', "%{$filtro}%")
            ->paginate();
    }
}
