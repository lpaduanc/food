<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProfileRepositoryInterface
{
    public function index(): LengthAwarePaginator;

    public function create();

    public function store(array $data): void;

    public function show(string $permissionId);

    public function edit();

    public function update(string $profileId, array $data): bool;

    public function destroy(string $permissionId): bool;

    public function search(string $filter): LengthAwarePaginator;

    // public function getProfilePermissions(string $profileId);
}