<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ["user_id","latitude","longitude"];
    protected $table = "locations";
}
