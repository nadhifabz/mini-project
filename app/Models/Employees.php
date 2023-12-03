<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Companies(){
        return $this->belongsTo(Company::class);
    }
}
