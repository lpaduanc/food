<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionsRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.permissions.index', [
            'permissions' => $this->permissionService->index()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePermissionsRequest  $storePermissionsRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionsRequest $storePermissionsRequest)
    {
        $this->permissionService->store($storePermissionsRequest->all());

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function show($permissionId)
    {
        $permission = $this->permissionService->show($permissionId);

        if (!$permission) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', [
            'permission' => $permission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function edit($permissionId)
    {
        $permission = $this->permissionService->show($permissionId);

        if (!$permission) {
            return redirect()->back();
        }
        
        return view('admin.pages.permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StorePermissionsRequest  $storePermissionsRequest
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function update(StorePermissionsRequest $storePermissionsRequest, $permissionId)
    {
        $permission = $this->permissionService->show($permissionId);

        if (!$permission) {
            return redirect()->back();
        }

        $this->permissionService->update($storePermissionsRequest->all());

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $permissionId
     * @return \Illuminate\Http\Response
     */
    public function destroy($permissionId)
    {
        $permission = $this->permissionService->show($permissionId);

        if (!$permission) {
            return redirect()->back();
        }

        $this->permissionService->destroy($permissionId);

        return redirect()->route('permissions.index');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return view('admin.pages.permissions.index', [
            'permissions' => $this->permissionService->search($request->all()),
            'filter' => $request->only('filter'),
        ]);
    }
}