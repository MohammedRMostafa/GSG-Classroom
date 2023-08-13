<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassworkUser extends Pivot
{
    use HasFactory;

    public function setUpdatedAt($value)
    {
        return $this;
    }
}
