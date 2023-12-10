<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinRubrique extends Model
{
    use HasFactory;

    protected $table = 'bulletin_rubrique';

    protected $guarded = [];
}
