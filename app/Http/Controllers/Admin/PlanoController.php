<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        $data = $request->all();

        $data['url'] = Str::kebab($request->nome);

        $this->planoRepository->create($data);

        return redirect()->route('planos.index');
    }

    public function show($url)
    {
        if (!$plano = $this->planoRepository->where('url', $url)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.planos.show', [
            'plano' => $plano
        ]);
    }
}
