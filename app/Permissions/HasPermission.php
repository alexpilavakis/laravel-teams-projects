<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 06/12/2018
 * Time: 11:37 ΠΜ
 */

namespace App\Permissions;
use App\Role;
use App\Permission;

trait HasPermission{

    public function roles() {
        return $this->belongsToMany(Role::class,'role_user');

    }


    public function permissions() {
        return $this->belongsToMany(Permission::class,'user_permission');

    }


    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function hasPermission($permission) {
        return $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    public function givePermissionTo($slug) {
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if ($permission->slug === $slug) {
                $this->permissions()->attach($permission);
            }
        }
        return $this;
    }

    public function deletePermission($slug ) {
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if ($permission->slug === $slug) {
                $this->permissions()->detach($permission);
            }
        }
        return $this;
    }

    public function giveRoleTo($slug) {
        $roles = Role::all();
        foreach ($roles as $role) {
            if ($role->slug === $slug) {
                $this->roles()->attach($role);
            }
        }
        return $this;
    }

    public function removeRole($slug ) {
        $roles = Role::all();
        foreach ($roles as $role) {
            if ($role->slug === $slug) {
                $this->roles()->detach($role);
            }
        }
        return $this;
    }

}