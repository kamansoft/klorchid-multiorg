<?php
namespace Kamansoft\LaravelMultiorg\Models;

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

}