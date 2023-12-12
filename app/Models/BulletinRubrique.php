<?php

namespace App\Models;

use App\Models\Rubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BulletinRubrique extends Model
{
    use HasFactory;

    protected $table = 'bulletin_rubrique';

    protected $guarded = [];

    public function rubrique()
    {
        return $this->belongsTo(Rubrique::class);
    }
}
