<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningEnvironment extends Model
{
    use HasFactory;

    protected $table = 'learning_environment';
    protected $fillable = 
    [
      'name',
      'capacity',
      'area_mt2',
      'floor',
      'inventory',
      'type_id',
      'location_id',
      'status'
    ];
}
