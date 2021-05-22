<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetalhesPlano;
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

    public function create($url)
    {
        $plano = $this->plano->where('url', $url)->first();

        if (!$plano) {
            return redirect()->back();
        }

        return view('admin.pages.planos.detalhes.create', [
            'plano' => $plano,
        ]);
    }

    public function store(StoreUpdateDetalhesPlano $storeUpdateDetalhesPlano, $url)
    {
        $plano = $this->plano->where('url', $url)->first();

        if (!$plano) {
            return redirect()->back();
        }

        $plano->detalhes()->create($storeUpdateDetalhesPlano->all());

        return redirect()->route('detalhes.plano.index', $plano->url);
    }

    public function edit($url, $idDetalhe)
    {
        $plano = $this->plano->where('url', $url)->first();
        $detalhe = $this->detalhesPlanoRepository->find($idDetalhe);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        return view('admin.pages.planos.detalhes.edit', [
            'plano' => $plano,
            'detalhe' => $detalhe,
        ]);
    }

    public function update(StoreUpdateDetalhesPlano $storeUpdateDetalhesPlano, $url, $idDetalhe)
    {
        $plano = $this->plano->where('url', $url)->first();
        $detalhe = $this->detalhesPlanoRepository->find($idDetalhe);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        $detalhe->update($storeUpdateDetalhesPlano->all());

        return redirect()->route('detalhes.plano.index', $plano->url);
    }
}
