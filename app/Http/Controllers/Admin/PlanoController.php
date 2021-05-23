<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanoRequest;
use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    private $planoRepository;

    public function __construct(
        Plano $plano
    )
    {
        $this->planoRepository = $plano;
    }
    public function index()
    {
        return view('admin.pages.planos.index', [
            'planos' => $this->planoRepository->latest()->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.pages.planos.create');
    }

    public function store(StoreUpdatePlanoRequest $storeUpdatePlanoRequest)
    {
        $this->planoRepository->create($storeUpdatePlanoRequest->all());

        return redirect()->route('planos.index');
    }

    public function show($url)
    {
        $plano = $this->planoRepository->where('url', $url)->first();

        if (!$plano) {
            return redirect()->back();
        }

        return view('admin.pages.planos.show', [
            'plano' => $plano
        ]);
    }

    public function destroy($url)
    {
        $plano = $this->planoRepository
            ->with('detalhes')
            ->where('url', $url)
            ->first();
        
        if (!$plano) {
            return redirect()->back();
        }

        if ($this->verificaSeExisteDetalhe($plano)) {
            return redirect()
                ->back()
                ->with('erro', 'Não foi possível excluir. Plano possui detalhes.');
        }

        $plano->delete();

        return redirect()->route('planos.index');
    }

    public function search(Request $request)
    {
        return view('admin.pages.planos.index', [
            'planos' => $this->planoRepository->pesquisar($request->filtro),
            'filtro' => $request->except('_token')
        ]);
    }

    public function edit($url)
    {
        $plano = $this->planoRepository->where('url', $url)->first();

        if (!$plano) {
            return redirect()->back();
        }

        return view('admin.pages.planos.edit', [
            'plano' => $plano
        ]);
    }

    public function update(StoreUpdatePlanoRequest $storeUpdatePlanoRequest, $url)
    {
        $plano = $this->planoRepository->where('url', $url)->first();

        if (!$plano) {
            return redirect()->back();
        }

        $plano->update($storeUpdatePlanoRequest->all());

        return redirect()->route('planos.index');
    }

    // passar para um service
    private function verificaSeExisteDetalhe(Plano $plano)
    {
        return $plano->detalhes->count() > 0;
    }
}
