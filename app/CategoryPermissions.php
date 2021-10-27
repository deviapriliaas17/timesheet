<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPermissions extends Model
{
    protected $table = 'category_permissions';
    protected $fillable = ['name_category' , 'category_code'];
}
