<?php

namespace App\DataTables;

class CommonData
{
    public function htmlButton($route = false): array
    {
        $btn = '';
        if ($route) {
            $btn = [
                'className' => 'btn btn-primary btn-lg mr-2 add-new-button',
                'text' => '<i class="icon-plus2"></i> Add',
                'action' => 'function( e, dt, button, config){
                             getModel("'.route($route.'.create').'");
                         }',
            ];
        }

        return [
            $btn,
            [
                'extend' => 'csv',
                'className' => 'btn btn-outline bg-primary border-primary text-primary-800 btn-icon',
                'text' => '<i class="icon-file-empty position-left"></i> CSV'
            ],
            [
                'extend' => 'excel',
                'className' => 'btn btn-outline bg-primary border-primary text-primary-800 btn-icon',
                'text' => '<i class="icon-file-excel position-left"></i> Excel'
            ],
            [
                'extend' => 'pdf',
                'className' => 'btn btn-outline bg-primary border-primary text-primary-800 btn-icon',
                'text' => '<i class="icon-file-pdf position-left"></i> PDF'
            ],
            [
                'extend' => 'print',
                'className' => 'btn btn-outline bg-primary border-primary text-primary-800 btn-icon',
                'text' => '<i class="icon-printer position-left"></i> Print'
            ]
        ];
    }
}
