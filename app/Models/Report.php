<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RyanChandler\Comments\Concerns\HasComments;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, SoftDeletes, HasComments;

    protected $fillable = [
        'student_id',
        'description',
        'anonim',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function scopeWhereStatus($query, string $status1, ?string $status2 = null)
    {
        return $query->where('status', $status1)->when($status2, function ($query) use ($status2) {
            $query->orWhere('status', $status2);
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(ReportImages::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
