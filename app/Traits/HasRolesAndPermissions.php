<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasRolesAndPermissions
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, "users_roles");
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, "users_permissions");
    }

    public function hasRole(... $roles)
    {
        foreach($roles as $role)
            if($this->roles->contains("slug", $role))
                return true;

        return false;
    }

    public function hasPermission($permission)
    {
        return (bool)$this->permissions->where("slug", $permission->slug)->count();
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach($permission->roles as $role)
            if($this->roles->contains($role))
                return true;

        return false;
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermission($permission) || $this->hasPermissionThroughRole($permission);
    }

    public function getPermissionsAll(... $permissions)
    {
        return Permission::whereIn("slug", $permissions);
    }

    public function givePermissions(... $permissions)
    {
        $permissions = $this->getPermissionsAll($permissions);
        if($permissions === null)
            return $this;

        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions(... $permissions)
    {
        $permissions = $this->getPermissionsAll($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(... $permissions)
    {
        $this->permissions()->detach($permissions);
        return $this->getPermissionsTo($permissions);
    }
}

