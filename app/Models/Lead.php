<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\SendToHttpBinJob;

class Lead extends Model
{
    protected $table = 'leads';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'wantToBuy'
    ];
    protected static function boot() {
        parent::boot();

        static::created(function($lead) {
            if($lead->wantToBuy){
                SendToHttpBinJob::dispatch($lead)->onQueue('httpbin');
            }
        });
    }
}
