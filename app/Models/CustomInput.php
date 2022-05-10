<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
class CustomInput extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $fillable = ['name','field','user_id','company_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

}
