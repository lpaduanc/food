<?php

namespace App\Services;

use App\Repositories\Contracts\PlanRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PlanService
{
    private $planRepository;

    public function __construct(
        PlanRepositoryInterface $planRepositoryInterface
    )
    {
        $this->planRepository = $planRepositoryInterface;    
    }

    public function index(): LengthAwarePaginator
    {
        return $this->planRepository->index();
    }

    public function store(array $data): void
    {
        $this->planRepository->store($data);
    }

    public function show(string $url)
    {
        return $this->planRepository->show($url);
    }

    public function edit(string $url)
    {
        return $this->show($url);
    }

    public function update(array $data, string $url): bool
    {
        if (!$this->show($url)) {
            return false;
        }

        return $this->planRepository->update($data);
    }

    public function destroy(string $url)
    {
        $plan = $this->show($url);

        if (!$plan) {
            return false;
        }

        if ($this->verifyIfDetailExists($plan)) {
            return 'details';
        }

        return $this->planRepository->destroy($plan);
    }

    public function search(string $filter): LengthAwarePaginator
    {        
        return $this->planRepository->search($filter);
    }

    public function verifyIfDetailExists($plan)
    {
        return $plan->details->count() > 0;
    }
}