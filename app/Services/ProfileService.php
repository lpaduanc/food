<?php

namespace App\Services;

use App\Repositories\Contracts\ProfileRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    private $profileRepository;
    private $permissionService;

    public function __construct(
        ProfileRepositoryInterface $profileRepositoryInterface,
        PermissionService $permissionService
    )
    {
        $this->profileRepository = $profileRepositoryInterface;
        $this->permissionService = $permissionService;
    }

    public function index(): LengthAwarePaginator
    {
        return $this->profileRepository->index();
    }

    public function store(array $data): void
    {
        $this->profileRepository->store($data);
    }

    public function show(string $profileId)
    {
        return $this->profileRepository->show($profileId);
    }

    public function update(string $profileId, array $data): bool
    {
        $profile = $this->show($profileId);

        if (!$profile) {
            return false;
        }

        return $this->profileRepository->update($profileId, $data);
    }

    public function destroy(string $profileId): bool
    {
        return $this->profileRepository->destroy($profileId);
    }

    public function search(string $filter): LengthAwarePaginator
    {        
        return $this->profileRepository->search($filter);
    }

    public function getProfilePermissions(string $profileId)
    {
        $profile = $this->show($profileId);

        if (!$profile) {
            return false;
        }

        $result['profile'] = $profile;

        $result['permissions'] = $this->permissionService->getByIds($this->getPermissionIds($profileId));

        if (count($result)) {
            return $result;
        }

        return false;
    }

    public function getAvailablePermissions(string $profileId)
    {
        $profile = $this->show($profileId);

        if (!$profile) {
            return false;
        }

        $result['profile'] = $profile;

        $result['permissions'] = $this->permissionService->index();

        if (count($result)) {
            return $result;
        }

        return false;
    }

    public function storePermissionToProfile(array $data, string $profileId)
    {
        foreach($data as $value) {
            DB::insert("INSERT INTO permission_profile (permission_id, profile_id) VALUES ({$value}, {$profileId})");
        }
    }

    private function getPermissionIds(string $profileId): array
    {
       $permissions = DB::select('SELECT * FROM permission_profile WHERE profile_id = '. $profileId);

       $result = [];

       foreach($permissions as $permission) {
            $result[] = $permission->permission_id;
       }

       return $result;
    }
}