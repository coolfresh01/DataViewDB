<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;

class EstadoDb extends Model {

    protected $table = 'estado_db';

    protected $fillable = [
        'estado'
    ];
    
    public function servidor() {
        return $this->hasMany('Modules\Monitor\Entities\Basededatos');
    }

}