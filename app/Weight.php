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

    public function getByWeek($id, $weeks = 0)
    {      
        $startOfWeek = date("Y-m-d", strtotime(Carbon::now()->startOfWeek()->addWeeks($weeks)));
        $endOfWeek = date("Y-m-d", strtotime(Carbon::now()->endOfWeek()->addWeeks($weeks)));

        return [$this
        ->where('user_id', '=', $id)
        ->whereBetween('inserted_at', [Carbon::now()->startOfWeek()->addWeeks($weeks), Carbon::now()->endOfWeek()->addWeeks($weeks)])->get()
        , $startOfWeek
        , $endOfWeek ];
    }

    public function thisMonth($id) {
        return $this
        ->where('user_id', '=', $id)
        ->whereBetween('inserted_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
    }
}
