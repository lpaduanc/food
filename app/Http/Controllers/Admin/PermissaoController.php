<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermissaoRequest;
use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    protected $permissaoRepository;

    public function __construct(Permissao $permissao)
    {
        $this->permissaoRepository = $permissao;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.permissoes.index', [
            'permissoes' => $this->permissaoRepository->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermissaoRequest  $StoreUpdatePermissaoRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermissaoRequest $StoreUpdatePermissaoRequest)
    {
        $this->permissaoRepository->create($StoreUpdatePermissaoRequest->all());

        return redirect()->route('permissoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idPermissao
     * @return \Illuminate\Http\Response
     */
    public function show($idPermissao)
    {
        $permissao = $this->permissaoRepository->find($idPermissao);

        if (!$permissao) {
            return redirect()->back();
        }

        return view('admin.pages.permissoes.show', [
            'permissao' => $permissao,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idPermissao
     * @return \Illuminate\Http\Response
     */
    public function edit($idPermissao)
    {
        $permissao = $this->permissaoRepository->find($idPermissao);

        if (!$permissao) {
            return redirect()->back();
        }
        
        return view('admin.pages.permissoes.edit', [
            'permissao' => $permissao,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermissaoRequest  $StoreUpdatePermissaoRequest
     * @param  int  $idPermissao
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermissaoRequest $StoreUpdatePermissaoRequest, $idPermissao)
    {
        $permissao = $this->permissaoRepository->find($idPermissao);

        if (!$permissao) {
            return redirect()->back();
        }

        $permissao->update($StoreUpdatePermissaoRequest->all());

        return redirect()->route('permissoes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idPermissao
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPermissao)
    {
        $permissao = $this->permissaoRepository->find($idPermissao);

        if (!$permissao) {
            return redirect()->back();
        }

        $permissao->delete();

        return redirect()->route('permissoes.index');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $permissoes = $this->permissaoRepository
            ->where(function ($query) use ($request) {
                if ($request->filtro) {
                    $query
                        ->where('nome', $request->filtro)
                        ->orWhere('descricao', 'LIKE', "%{$request->filtrar}%");
                }
            })
            ->paginate();

        return view('admin.pages.permissoes.index', [
            'permissoes' => $permissoes,
            'filtro' => $request->only('filtro'),
        ]);
    }
}