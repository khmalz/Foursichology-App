<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'path',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
