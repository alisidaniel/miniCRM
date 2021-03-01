<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'name', 
        'email', 
        'password', 
        'logo', 
        'url',
    ];

    public function employee()
    {
        return $this->hasMany('App\Modles\User', 'company_id', 'id');
    }

}
