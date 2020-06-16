<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class Weight extends Model
{
    protected $table = 'user_weights';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function thisWeek($id)
    {   
        return $this
        ->where('user_id', '=', $id)
        ->whereBetween('inserted_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
    }

    public function thisMonth($id) {
        return $this
        ->where('user_id', '=', $id)
        ->whereBetween('inserted_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
    }
}
