<?php
namespace Kamansoft\LaravelMultiorg;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Third extends Model
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thirds';


    protected $fillable = [
        'name',
        'description'

    ];

}