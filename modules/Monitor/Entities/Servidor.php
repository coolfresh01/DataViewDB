<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servidor extends Model {
    
    protected $table = 'servidor';

    protected $fillable = [
        'nombre',
        'RAM',
        'ambiente_id',
        'estado_servidor_id',
        'sistema_operativo_id'
    ];
    
    public function ambiente() {
        return $this->belongsTo('Modules\Monitor\Entities\Ambiente', 'ambiente_id');
    }
    
    public function sistemaoperativo() {
        return $this->belongsTo('Modules\Monitor\Entities\SistemaOperativo', 'sistema_operativo_id');
    }
    
    public function estado_servidor() {
        return $this->belongsTo('Modules\Monitor\Entities\EstadoServidor', 'estado_servidor_id');
    }
    
    public function ip() {
        return $this->hasMany('Modules\Monitor\Entities\DireccionIp');
    }
    
    public function bd() {
        return $this->hasMany('Modules\Monitor\Entities\Basededatos');
    }
    
    public static function getAllServidores() {

        return DB::table('servidor')
            ->join('ambiente', 'servidor.ambiente_id', '=', 'ambiente.id')
            ->join('estado_servidor', 'servidor.estado_servidor_id', '=', 'estado_servidor.id')
            ->join('sistema_operativo', 'servidor.sistema_operativo_id', '=', 'sistema_operativo.id')
            ->select('servidor.id', 'servidor.nombre as servidor', 'servidor.RAM', 'estado_servidor.estado as estado_servidor', 
                    'ambiente.nombre as ambiente', 'sistema_operativo.nombre as sistema_operativo')
            ->get();
    }
    
    
}