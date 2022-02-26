<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PlanDetailsRepositoryInterface
{
    public function index(string $url): LengthAwarePaginator;

    public function create();

    public function store(array $data): void;

    public function show(string $planDetailId);

    public function edit();

    public function update(string $detailId, array $data): bool;

    public function destroy(int $detailId): bool;    

    public function getByPlanId(string $planId): LengthAwarePaginator;
}