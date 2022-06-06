<style>
    table.dataTable {
        margin: 0 auto;
    }
</style>
    <table class="table table-striped table-bordered table-grow" id="generic-table" style="width:50%">
        <thead>
        <tr>
            <th >Nombre</th>
            <th>Sigla</th>
            <th width="30%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($capitanias as $capitania)
            <tr>
                <td>{{ $capitania->nombre }}</td>
                <td>{{ $capitania->sigla }}</td>
                <td>
                    @can('consultar-capitania')
                        <a class="btn btn-sm btn-success" href="  {{ route('capitanias.show', [$capitania->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-capitania')
                        <a class="btn btn-sm btn-info" href=" {{ route('capitanias.edit', [$capitania->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-capitania')
                        <div class='btn-group'>
                            {!! Form::open(['route' => ['capitanias.destroy', $capitania->id], 'method' => 'delete','class'=>'delete-form']) !!}

                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar" data-mensaje="la Capitania {{$capitania->nombre}}">
                                <i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                        </div>
                @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
