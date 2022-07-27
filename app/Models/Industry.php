<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = ['industry_name'];

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function totalCompany() {
        return Company::where('industry_id', $this->id)->count();
    }
}
