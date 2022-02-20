    <table class="table table-responsive-sm table-bordered table-striped table-audit" id="auditables-table">
        <thead>
            <tr>
                <th>Id</th>
                <th style=" max-width: 30px; font-size: 12px">ID Usuario</th>
                <th>Evento</th>
                <th style="max-width: 30px; font-size: 12px">ID afectado</th>
                <th>Anterior</th>
                <th>Modificado</th>
                <th>Fecha</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        @foreach($auditables as $auditable)
            <tr>
                <td>{{ $auditable->id }}</td>
                <td>{{ $auditable->user_id }}</td>
                <td>{{ $auditable->event }}</td>
                <td>{{ $auditable->auditable_id }}</td>
                <td>{{ json_encode($auditable->old_values )}}</td>
                <td>{{ json_encode($auditable->new_values) }}</td>
                <td>{{ $auditable->created_at }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('auditables.show', [$auditable->id]) }}"  class="btn btn-sm btn-success"> <i class="fa fa-search"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>