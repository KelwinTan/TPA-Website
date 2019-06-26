<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Review extends Model
{
    use SoftDeletes;
    protected $softDelete = true;

    protected $keyType = 'string';
    public $incrementing = false;

    public function reviewable(){
        return $this->morphTo();
    }
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::creating(function($review){
            $review->id = Uuid::generate()->string;
        });
    }


}
