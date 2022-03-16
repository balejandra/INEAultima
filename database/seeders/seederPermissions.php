<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class seederPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            //Permisos para users
            'listar-usuario',
            'crear-usuario',
            'editar-usuario',
            'consultar-usuario',
            'eliminar-usuario',

            //permisos para roles
            'listar-rol',
            'crear-rol',
            'editar-rol',
            'consultar-rol',
            'eliminar-rol',

            //Permisos para permisos
            'listar-permiso',
            'crear-permiso',
            'editar-permiso',
            'consultar-permiso',
            'eliminar-permiso',

            //Permisos para menus
            'listar-menu',
            'crear-menu',
            'editar-menu',
            'consultar-menu',
            'eliminar-menu',

            //Permisos para capitanias
            'listar-capitania',
            'crear-capitania',
            'editar-capitania',
            'consultar-capitania',
            'eliminar-capitania',

            //Permisos para permisos de zarpes
            'consultar-zarpe',
            'eliminar-zarpe',
            'aprobar-zarpe',
            'rechazar-zarpe',
            'informar-arribo',
            'informar-navegacion',
            'anular-sar',
            'anular-zarpeUsuario',
            'listar-zarpes-todos', //admin
            'listar-zarpesgenerados',//usuariosweb
            'listar-zarpes-capitania-origen',
            'listar-zarpes-establecimiento-origen',//comodoros
            'listar-zarpe-destino', //comodoro, capitan, comodoro_aprovador

            //permisos para permisos de estadia
            'crear-estadia',
            'asignar-visita-estadia',
            'visita-estadia-aprobada',
            'recaudos-estadia',
            'aprobar-estadia',
            'rechazar-estadia',
            'anular-estadia',
            'listar-estadia-todos',
            'listar-estadia-generados',
            'listar-estadia-coordinador',
            'listar-estadia-capitania-destino',
             
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
    }
}
