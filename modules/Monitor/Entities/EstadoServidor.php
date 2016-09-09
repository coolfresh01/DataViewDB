<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;

class EstadoServidor extends Model {

    protected $table = 'estado_servidor';

    protected $fillable = [
        'estado'
    ];
    
    public function servidor() {
        return $this->hasMany('Modules\Monitor\Entities\Servidor');
    }

}