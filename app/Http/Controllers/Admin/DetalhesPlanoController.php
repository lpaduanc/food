<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalhesPlano;
use App\Models\Plano;
use Illuminate\Http\Request;

class DetalhesPlanoController extends Controller
{
    private $detalhesPlanoRepository;

    private $plano;

    public function __construct(
        DetalhesPlano $detalhesPlano,
        Plano $plano
    )
    {
        $this->detalhesPlanoRepository = $detalhesPlano;
        $this->plano = $plano;
    }

    public function index($url)
    {
        $plano = $this->plano->where('url', $url)->first();

        if (!$plano) {
            return redirect()->back();
        }

        return view('admin.pages.planos.detalhes.index', [
            'plano' => $plano,
            'detalhes' => $plano->detalhes()->paginate(),
        ]);
    }
}
