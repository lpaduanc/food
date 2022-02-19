<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'price',
        'description',
    ];

    //faz o relacionamento de 1 para muitos
    public function details()
    {
        return $this->hasMany(PlanDetails::class);
    }

    public function search($filter = null)
    {
        return $this
            ->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();
    }
}
