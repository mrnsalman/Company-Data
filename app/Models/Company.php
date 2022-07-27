<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','company_name','industry_id','company_address','contactPerson_name','Designation','contact_number','email','unique_id','strength','loopholes','scopes'];

    public function getIndustry()
    {
        return $this->belongsTo(Industry::class,'industry_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
