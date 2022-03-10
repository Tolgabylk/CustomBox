<?php

namespace wishlist\modele;

class Produit extends \Illuminate\Database\Eloquent\models
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = 'false';
}

