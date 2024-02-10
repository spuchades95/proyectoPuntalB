<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class AdministrativeBerths extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'Administrativo_id',
        'Amarre_id',

    ];

    protected $table = 'administrative_berths';

    public function Administrativo()
    {
        return $this->belongsTo(Administrative::class);
    }

    public function Amarre()
    {
        return $this->belongsTo(Berth::class);
    }
}
