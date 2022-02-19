<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanDetails;
use App\Models\Plan;
use App\Models\PlanDetails;

class PlanDetailsController extends Controller
{
    private $planDetailsRepository;

    private $plan;

    public function __construct(
        PlanDetails $planDetails,
        Plan $plan
    )
    {
        $this->planDetailsRepository = $planDetails;
        $this->plan = $plan;
    }

    public function index($url)
    {
        $plan = $this->plan->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $plan->details()->paginate(),
        ]);
    }

    public function create($url)
    {
        $plan = $this->plan->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);
    }

    public function store(StorePlanDetails $storePlanDetails, $url)
    {
        $plan = $this->plan->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->details()->create($storePlanDetails->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function edit($url, $detailId)
    {
        $plan = $this->plan->where('url', $url)->first();
        $details = $this->planDetailsRepository->find($detailId);

        if (!$plan || !$details) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function update(StorePlanDetails $storePlanDetails, $url, $detailId)
    {
        $plan = $this->plan->where('url', $url)->first();
        $details = $this->planDetailsRepository->find($detailId);

        if (!$plan || !$details) {
            return redirect()->back();
        }

        $details->update($storePlanDetails->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function show($url, $detailId)
    {
        $plan = $this->plan->where('url', $url)->first();
        $details = $this->planDetailsRepository->find($detailId);

        if (!$plan || !$details) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function destroy($planUrl, $detailId)
    {
        $plan = $this->plan->where('url', $planUrl)->first();
        $details = $this->planDetailsRepository->find($detailId);

        if (!$plan || !$details) {
            return redirect()->back();
        }

        $details->delete();

        return redirect()
            ->route('details.plan.index', $plan->url)
            ->with('message', 'Detalhe excluído com sucesso.');
    }
}
