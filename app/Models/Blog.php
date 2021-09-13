<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    protected $table = "blogs";
    protected $guarded = [];
    protected $appends = ['image_path'];


    function getImagePathAttribute(){

        return asset('uploads/img/' .$this->image);
        
    }

    function scopeSelection($q){

        // translation_lang example en ....
        return $q->select('id' ,'title' ,'content','image','translation_lang' ,'translation_of');
    }


            // Relation same model
            public function blogs()
            {
                return $this->hasMany(self::class, 'translation_of');
            }

}
