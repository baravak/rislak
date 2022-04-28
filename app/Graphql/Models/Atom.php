<?php
namespace App\Graphql\Models;

use stdClass;

class Atom extends Model{
    private $_commissions;

    public function getCommissionsAttribute(){
        if(!$this->_commissions){
            $this->_commissions = new stdClass;
            foreach($this->attributes['commissions'] as $commission){
                $this->_commissions->{strtolower($commission->topic)} = (object) [
                    'value' => $commission->value,
                    'pinned' => $commission->pinned,
                ];
            }
        }
        return $this->_commissions;
    }
}
