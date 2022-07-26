<?php

/**
 * Resource route names
 *
 * @param $name
 * @return array
 */
function resourceNames($name): array
{
    return [
        'names' => [
            'index' => $name.'.index',      // get:     Base page
            'create' => $name.'.create',    // get:     Used to show the create page
            'store' => $name.'.store',      // post:    Used to pass data to backend and store
            'show' => $name.'.show',        // get:     Show a record for a given ID
            'edit' => $name.'.edit',        // get:     Used to show the edit page for a record
            'update' => $name.'.update',    // put:     Used to pass data to backend to store update data
            'destroy' => $name.'.destroy',  // delete:  Delete a record for a given ID
        ]
    ];
}
