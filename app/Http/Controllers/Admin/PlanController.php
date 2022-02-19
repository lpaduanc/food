<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\StoreUpdatePlanoRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $planRepository;

    public function __construct(
        Plan $plan
    )
    {
        $this->planRepository = $plan;
    }
    public function index()
    {
        return view('admin.pages.plans.index', [
            'plans' => $this->planRepository->latest()->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StorePlanRequest $storePlanRequest)
    {
        $this->planRepository->create($storePlanRequest->all());

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy($url)
    {
        $plan = $this->planRepository
            ->with('detalhes')
            ->where('url', $url)
            ->first();
        
        if (!$plan) {
            return redirect()->back();
        }

        if ($this->verifyIfDetailExists($plan)) {
            return redirect()
                ->back()
                ->with('erro', 'Impossível excluir. Plano possui detalhes.');
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        return view('admin.pages.plans.index', [
            'plans' => $this->planRepository->pesquisar($request->filter),
            'filter' => $request->except('_token')
        ]);
    }

    public function edit($url)
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StorePlanRequest $storePlanRequest, $url)
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($storePlanRequest->all());

        return redirect()->route('plans.index');
    }

    // passar para um service
    private function verifyIfDetailExists(Plan $plan)
    {
        return $plan->details->count() > 0;
    }
}
