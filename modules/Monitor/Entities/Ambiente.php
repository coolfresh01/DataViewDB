<?php namespace Modules\Monitor\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ambiente extends Model {

    protected $table = 'ambiente';

    protected $fillable = [
        'nombre'
    ];
    
    public function servidor() {
        return $this->hasMany('Modules\Monitor\Entities\Servidor');
    }

}