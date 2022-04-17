<?php

namespace Kamansoft\LaravelMultiorg\Models;

class OrganizationRole extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'organization_roles';

    protected $fillable = [
        'organization_id',
        'role_id',
        'extra_data'
    ];

    public function thirds(){
        return $this->belongsToMany(Third::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

}