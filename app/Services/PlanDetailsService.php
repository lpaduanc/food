<?php

namespace App\Services;

use App\Repositories\Contracts\PlanDetailsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PlanDetailsService
{
    private $planDetailsRepository;
    private $planService;

    public function __construct(
        PlanDetailsRepositoryInterface $planDetailsRepositoryInterface,
        PlanService $planService
    )
    {
        $this->planDetailsRepository = $planDetailsRepositoryInterface;
        $this->planService = $planService; 
    }

    public function index(string $url): LengthAwarePaginator
    {
        return $this->planDetailsRepository->index($url);
    }

    public function store(array $data, $url)
    {
        $plan = $this->getPlanbyUrl($url);

        if (!$plan) {
            return false;
        }

        $this->planDetailsRepository->store([
            'plan_id' => $plan->id,
            'name' => $data['name']
        ]);

        return $plan;
    }

    public function show(string $detailId)
    {
        return $this->planDetailsRepository->show($detailId);
    }

    public function edit(string $url, string $detailId)
    {
        $plan = $this->getPlanbyUrl($url);

        $detail = $this->show($detailId);

        if (!$plan || !$detail) {
            return false;
        }

        return [
            'plan' => $plan,
            'detail' => $detail,
        ];
    }

    public function update(string $url, string $detailId, array $data)
    {
        $plan = $this->getPlanbyUrl($url);

        if (!$plan || !$this->show($detailId)) {
            return false;
        }

        $this->planDetailsRepository->update($detailId, $data);

        return [
            'url' => $plan->url
        ];
    }

    public function destroy(string $url, string $detailId): bool
    {
        $plan = $this->getPlanbyUrl($url);

        if (!$plan || !$this->show($detailId)) {
            return false;
        }

        $this->planDetailsRepository->destroy($detailId);

        return [
            'url' => $plan->url
        ];
    }

    public function search(array $data): LengthAwarePaginator
    {        
        return $this->planDetailsRepository->search($data);
    }

    public function getByPlanId(string $planId): LengthAwarePaginator
    {
        return $this->planDetailsRepository->getByPlanId($planId);
    }

    public function getPlanbyUrl(string $url)
    {
        return $this->planService->show($url);
    }
}