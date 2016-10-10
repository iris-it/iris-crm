<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'realname', 'path', 'organization_uuid'];

    /**
     * An os js group belongs to an organization
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    /**
     * A group can have many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'groups_users_pivot', 'group_id', 'user_id')->withTimestamps();
    }

}
