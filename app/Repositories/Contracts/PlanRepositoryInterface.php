<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface PlanRepositoryInterface
{
    public function index(): LengthAwarePaginator;

    public function create();

    public function store(array $data): void;

    public function show(string $url);

    public function edit();

    public function update(array $data): bool;

    public function destroy($plan): bool;

    public function search(string $filter): LengthAwarePaginator;
}