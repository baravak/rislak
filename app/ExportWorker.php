<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportWorker extends API
{
    public $endpointPath = 'export-workers/';
    protected $casts = [
        'cooked_at' => 'datetime',
        'failed_at' => 'datetime'
    ];
    public static function statusCheck(array $ids){
        return (new static)->execute("/live/workers-status-check", ['workers' => $ids], 'GET');
    }
}
