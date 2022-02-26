<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plan_id',
    ];

    // relacionamento de que o detalhe pertence a um plano
    public function plan()
    {
        $this->belongsTo(Plan::class);
    }
}
