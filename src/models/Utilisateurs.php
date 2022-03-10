<?php

namespace CustomBox\models;

class Utilisateurs extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Utilisateurs() {
        return $this->belongsTo('CustomBox\models\Utilisateurs', 'id');
    }
}