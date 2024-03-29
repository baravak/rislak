<?php
namespace App\Graphql\Models;

use stdClass;

class Region extends Model{
    protected $with = [
        'detail' => RegionDetail::class,
        'atoms' => Atoms::class
    ];
    private $_commissions;

    public function getCommissionsAttribute(){
        if(!$this->_commissions){
            $this->_commissions = new stdClass;
            foreach($this->attributes['commissions'] as $commission){
                $this->_commissions->{strtolower($commission->topic)} = $commission->value;
            }
        }
        return $this->_commissions;
    }
}
