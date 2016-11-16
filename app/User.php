<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub',
        'name',
        'preferred_username',
        'given_name',
        'family_name',
        'email',
        'resource_access',
        'settings',
        'role_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $casts = [
        'sub' => 'string',
        'resource_access' => 'json',
        'settings' => 'json'
    ];

    /**
     * this assign roles to an user (obvious isn'it ?)
     *
     * @param $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function assignRole($role)
    {
        $role = Role::where('name', $role)->firstOrFail();

        return $this->role()->associate($role)->save();
    }

    /**
     * check if user has role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->name == $role;
        }

        return false;
    }

    /**
     * check if user has role
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            foreach ($this->role->permissions as $permissionRole) {
                if ($permissionRole->name == $permission) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * An user has many roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }


    /**
     * An user has one organization
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne('App\UserProvider');
    }

    /**
     * An user has one organization
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    /**
     * An user can be in many groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('App\UserGroup', 'groups_users_pivot', 'user_id', 'group_id')->withTimestamps();
    }
}
