<?php
namespace App;


trait SessionTheme
{
    public $statusColors = [
        'draft' =>[
            'status' =>  'gray',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'registration_awaiting' =>[
            'status' =>  'yellow-600',
            'bg' => 'yellow-50',
            'border' => 'yellow-600'
        ],
        'client_awaiting' =>[
            'status' =>  'yellow-600',
            'bg' => 'yellow-50',
            'border' => 'yellow-600'
        ],
        'awaiting' =>[
            'status' =>  'yellow-600',
            'bg' => 'yellow-50',
            'border' => 'yellow-600'
        ],
        'session_awaiting' =>[
            'status' =>  'brand',
            'bg' => 'blue-50',
            'border' => 'blue-600'
        ],
        'in_session' =>[
            'status' =>  'green-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'finished' =>[
            'status' =>  'purple-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'canceled_by_client' =>[
            'status' =>  'red-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
        'canceled_by_center' =>[
            'status' =>  'red-500',
            'bg' => 'gray-50',
            'border' => 'gray-400'
        ],
    ];
    function getSessionStatusColorAttribute(){
        return $this->statusColors[$this->status]['status'];
    }
    function getSessionBgColorAttribute(){
        return $this->statusColors[$this->status]['bg'];
    }
    function getSessionBorderColorAttribute(){
        return $this->statusColors[$this->status]['border'];
    }
}
