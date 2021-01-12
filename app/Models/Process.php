<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $table = 'processes';
    protected $fillable = ['name', 'description', 'start', 'delivery', 'workedHours', 'status', 'projects_id'];
    public $timestamps = true;

    public function tasks()
    {
        return $this->hasMany(Taks::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
