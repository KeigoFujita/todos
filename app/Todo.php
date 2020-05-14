<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function present_created_at()
    {
        return $this->created_at->diffForHumans();
    }
}