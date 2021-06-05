<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePerfilRequest;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    protected $perfilRepository;
    
    public function __construct(Perfil $perfil)
    {
        $this->perfilRepository = $perfil;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.perfis.index', [
            'perfis' => $this->perfilRepository->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.perfis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePerfilRequest  $storeUpdatePerfilRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePerfilRequest $storeUpdatePerfilRequest)
    {
        $this->perfilRepository->create($storeUpdatePerfilRequest->all());

        return redirect()->route('perfis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idPerfil
     * @return \Illuminate\Http\Response
     */
    public function show($idPerfil)
    {
        $perfil = $this->perfilRepository->find($idPerfil);

        if (!$perfil) {
            return redirect()->back();
        }

        return view('admin.pages.perfis.show', [
            'perfil' => $perfil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idPerfil
     * @return \Illuminate\Http\Response
     */
    public function edit($idPerfil)
    {
        $perfil = $this->perfilRepository->find($idPerfil);

        if (!$perfil) {
            return redirect()->back();
        }
        
        return view('admin.pages.perfis.edit', [
            'perfil' => $perfil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePerfilRequest  $storeUpdatePerfilRequest
     * @param  int  $idPerfil
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePerfilRequest $storeUpdatePerfilRequest, $idPerfil)
    {
        $perfil = $this->perfilRepository->find($idPerfil)->first();

        if (!$perfil) {
            return redirect()->back();
        }

        $perfil->update($storeUpdatePerfilRequest->all());

        return redirect()->route('perfis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idPerfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPerfil)
    {
        $perfil = $this->perfilRepository->find($idPerfil);

        if (!$perfil) {
            return redirect()->back();
        }

        $perfil->delete();

        return redirect()->route('perfis.index');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $perfis = $this->perfilRepository
            ->where(function ($query) use ($request) {
                if ($request->filtro) {
                    $query
                        ->where('nome', $request->filtro)
                        ->orWhere('descricao', 'LIKE', "%{$request->filtrar}%");
                }
            })
            ->paginate(1);

        return view('admin.pages.perfis.index', [
            'perfis' => $perfis,
            'filtro' => $request->only('filtro'),
        ]);
    }
}
