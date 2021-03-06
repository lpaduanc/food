<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PermissionRepository implements PermissionRepositoryInterface
{
    private $permissionModel;

    public function __construct(
        Permission $permissionModel
    )
    {
        $this->permissionModel = $permissionModel;    
    }

    public function index(): LengthAwarePaginator
    {
        return $this->permissionModel->paginate();
    }

    public function create()
    {
        
    }

    public function store(array $data): void
    {
        $this->permissionModel->create($data);
    }

    public function show(string $permissionId)
    {
        return $this->permissionModel->find($permissionId);
    }

    public function edit()
    {

    }

    public function update(array $data): bool
    {
        return $this->permissionModel->update($data);
    }

    public function destroy(int $permissionId): bool
    {
        return $this->permissionModel->delete($permissionId);
    }

    public function search(string $filter): LengthAwarePaginator
    {
        return $this->permissionModel
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query
                        ->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();
    }

    public function getByIds(array $permissionIds): LengthAwarePaginator
    {
        return $this->permissionModel->whereIn('id', $permissionIds)->paginate();
    }
}