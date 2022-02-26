<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Repositories\Contracts\PlanRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PlanRepository implements PlanRepositoryInterface
{
    private $planModel;

    public function __construct(
        Plan $planModel
    )
    {
        $this->planModel = $planModel;    
    }

    public function index(): LengthAwarePaginator
    {
        return $this->planModel->latest()->paginate();
    }

    public function create()
    {
        
    }

    public function store(array $data): void
    {
        $this->planModel->create($data);
    }

    public function show(string $url)
    {
        return $this->planModel->where('url', $url)->first();
    }

    public function edit()
    {

    }

    public function update(array $data): bool
    {
        return $this->planModel->update($data);
    }

    public function destroy($plan): bool
    {
        return $plan->delete();
    }

    public function search(string $filter): LengthAwarePaginator
    {
        return $this->planModel
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query
                        ->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();
    }
}