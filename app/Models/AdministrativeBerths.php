<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;


class AdministrativeBerths extends Pivot
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'Administrativo_id',
        'Amarre_id',

    ];

    protected $table = 'administrative_berths';

    public function administrativo()
    {
        return $this->belongsTo(Administrative::class, 'Administrativo_id');
    }

    public function amarre()
    {
        return $this->belongsTo(Berth::class, 'Amarre_id');
    }
}
