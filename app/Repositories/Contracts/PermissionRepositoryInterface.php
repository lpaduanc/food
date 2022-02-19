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

    public function destroy(int $permission): bool;

    public function search(array $data): Permission;
}