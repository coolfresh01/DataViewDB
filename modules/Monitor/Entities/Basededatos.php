<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Basededatos extends Model {

    protected $table = 'databases';

    protected $fillable = [
        'sid',
        'descripcion',
        'servidor_id',
        'estado_db_id'
    ];
    
    public function servidor() {
        return $this->belongsTo('Modules\Monitor\Entities\Servidor', 'servidor_id');
    }
    
    public function estadodb() {
        return $this->belongsTo('Modules\Monitor\Entities\EstadoDb', 'estado_db_id');
    }

}