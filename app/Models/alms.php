<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alms extends Model
{
    use HasFactory;
    protected $table = 'employes';
    protected $primary_key = 'id';
    protected $fillable = ['profile', 'code', 'Noun', 'Address', 'phone'];
}
