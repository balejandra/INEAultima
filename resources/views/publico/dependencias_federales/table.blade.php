<style>
    table.dataTable {
        margin: 0 auto;
    }
</style>
<table class="table table-striped table-bordered table-grow" id="generic-table" style="width:60%">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Capitanías</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dependenciaFederals as $dependenciaFederal)
        <tr>
            <td>{{ $dependenciaFederal->nombre }}</td>
            <td>{{ $dependenciaFederal->capitania}}   </td>
            <td width="20%" class="text-center">
                {!! Form::open(['route' => ['dependenciasfederales.destroy', $dependenciaFederal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('consultar-dependencia')
                        <a href="{{ route('dependenciasfederales.show', [$dependenciaFederal->id]) }}"
                           class='btn btn-sm btn-success'>
                            <i class="fa fa-search"></i>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                    @endcan
                    @can('editar-dependencia')
                        <a href="{{ route('dependenciasfederales.edit', [$dependenciaFederal->id]) }}"
                           class='btn btn-sm btn-info'>
                            <i class="fa fa-edit"></i>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                    @endcan
                    @can('eliminar-dependencia')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('¿Está seguto?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
