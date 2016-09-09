<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;

class SistemaOperativo extends Model {

    protected $table = 'sistema_operativo';

    protected $fillable = [
        'nombre',
        'arquitectura',
    ];
    
    public function servidor() {
        return $this->hasMany('Modules\Monitor\Entities\Servidor');
    }

}