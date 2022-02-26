<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\Contracts\ProfileRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProfileRepository implements ProfileRepositoryInterface
{
    private $profileModel;

    public function __construct(
        Profile $profileModel
    )
    {
        $this->profileModel = $profileModel;    
    }

    public function index(): LengthAwarePaginator
    {
        return $this->profileModel->paginate();
    }

    public function create()
    {
        
    }

    public function store(array $data): void
    {
        $this->profileModel->create($data);
    }

    public function show(string $profileId)
    {
        return $this->profileModel->find($profileId);
    }

    public function edit()
    {

    }

    public function update(string $profileId, array $data): bool
    {
        $this->profileModel = $this->show($profileId);

        return $this->profileModel->update($data);
    }

    public function destroy(string $profileId): bool
    {
        $this->profileModel = $this->show($profileId);

        return $this->profileModel->delete($profileId);
    }

    public function search(string $filter): LengthAwarePaginator
    {
        return $this->profileModel
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