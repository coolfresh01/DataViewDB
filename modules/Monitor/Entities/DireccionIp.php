<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;

class DireccionIp extends Model {

    protected $table = 'direccion_ip';

    protected $fillable = [
        'ip',
        'descripcion',
        'servidor_id'
    ];

    public function servidor() {
        return $this->belongsTo('Modules\Monitor\Entities\Servidor', 'servidor_id');
    }

}