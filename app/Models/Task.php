<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Validations\DateValidator;

class Task extends Model implements DateValidator
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = ['name', 'description', 'start', 'delivery', 'workedHours', 'status', 'processes_id'];
    public $timestamps = true;
    
    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function validateStartDate(string $date): bool
    {
        $project = DB::table('projects')
            ->where('start', '<=', $date)
            ->get();

        if ($project->isEmpty()) {
            return true;
        }

        return false;
    }

    public function validateDeliveryDate(string $delivery, string $processStartDate): bool
    {
        if ($delivery > $processStartDate) {
            return false;
        }

        return true;
    }
}
