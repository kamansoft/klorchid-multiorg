<?php
namespace Kamansoft\LaravelMultiorg\Models;

use App\Models\User;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Third extends Model
{

    public const JURIDICAL_PERSON_TYPE = 'juridical';
    public const NATURAL_PERSON_TYPE = 'natural';
    /*
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thirds';


    protected $fillable = [
        'person_type',
        'nin',
        'address',
        'name',
        'extra_data'

    ];


    public function users(){
        return $this->belongsTo(User::class);
    }

    public function organizationRoles(){
        return $this->belongsToMany(OrganizationRole::class);
    }

}