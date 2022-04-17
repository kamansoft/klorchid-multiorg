<?php
namespace Kamansoft\PlatformMultiorg\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Organization extends Model
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';


    protected $fillable = [
        'name',
        'description'

    ];


    public function thirds(){
        return $this->belongsToMany(Third::class);
    }

    public function  organizationRoles(){
        return $this->hasMany(OrganizationRole::class);
    }

}