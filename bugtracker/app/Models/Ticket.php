<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'Bugname', 'Priority','Description','status','solution','projectid','submittedby','assignedto'
    ];

    public function role() {
        return $this->hasOne('App\Models\ModelRole');
    }
}
