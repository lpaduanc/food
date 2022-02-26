<?php

namespace App\Services;

use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PermissionService
{
    private $permissionRepository;

    public function __construct(
        PermissionRepositoryInterface $permissionRepositoryInterface
    )
    {
        $this->permissionRepository = $permissionRepositoryInterface;    
    }

    public function index(): LengthAwarePaginator
    {
        return $this->permissionRepository->index();
    }

    public function store(array $data): void
    {
        $this->permissionRepository->store($data);
    }

    public function show(string $permissionId)
    {
        return $this->permissionRepository->show($permissionId);
    }

    public function update(array $data): bool
    {
        return $this->permissionRepository->update($data);
    }

    public function destroy(int $permissionId): bool
    {
        return $this->permissionRepository->destroy($permissionId);
    }

    public function search(string $filter): LengthAwarePaginator
    {        
        return $this->permissionRepository->search($filter);
    }

    public function getByIds(array $permissionIds)
    {
        return $this->permissionRepository->getByIds($permissionIds);
    }
}