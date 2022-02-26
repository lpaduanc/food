<?php

namespace App\Repositories\Contracts;

use App\Models\Permission;
use Illuminate\Pagination\LengthAwarePaginator;

interface PermissionRepositoryInterface
{
    public function index(): LengthAwarePaginator;

    public function create();

    public function store(array $data): void;

    public function show(string $permissionId);

    public function edit();

    public function update(array $data): bool;

    public function destroy(int $permissionId): bool;

    public function search(string $filter): LengthAwarePaginator;

    public function getByIds(array $data): LengthAwarePaginator;
}