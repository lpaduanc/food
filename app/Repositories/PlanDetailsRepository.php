<?php

namespace App\Repositories;

use App\Models\PlanDetails;
use App\Repositories\Contracts\PlanDetailsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PlanDetailsRepository implements PlanDetailsRepositoryInterface
{
    private $planDetailsModel;

    public function __construct(
        PlanDetails $planDetailsModel
    )
    {
        $this->planDetailsModel = $planDetailsModel;    
    }

    public function index(string $url): LengthAwarePaginator
    {
        return $this->planDetailsModel->where('url', $url)->first();
    }

    public function create()
    {
        
    }

    public function store(array $data): void
    {
        $this->planDetailsModel->create($data);
    }

    public function show(string $permissionId)
    {
        return $this->planDetailsModel->find($permissionId);
    }

    public function edit()
    {

    }

    public function update(string $detailId, array $data): bool
    {
        $this->planDetailsModel = $this->show($detailId);

        return $this->planDetailsModel->update($data);
    }

    public function destroy(int $detailId): bool
    {
        $this->planDetailsModel = $this->show($detailId);

        return $this->planDetailsModel->delete();
    }

    public function getByPlanId(string $planId): LengthAwarePaginator
    {
        return $this->planDetailsModel->where('plan_id', $planId)->paginate();
    }
}