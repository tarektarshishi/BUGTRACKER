<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $table = 'members';
    protected $fillable = ['projectid','modelid'];

    public function setModelAttribute($value)
    {
        $this->attributes['modelid'] = json_encode($value);
    }

    public function getModelAttribute($value)
    {
        return $this->attributes['modelid'] = json_decode($value);
    }
    use HasFactory;
}
