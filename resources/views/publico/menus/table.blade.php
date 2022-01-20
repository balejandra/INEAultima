<table class="table table-responsive-sm table-bordered table-striped " id="menus-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Url</th>
        <th>Parent</th>
        <th>Order</th>
        <th>Icono</th>
        <th>Enabled</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->id }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->description }}</td>
            <td>{{ $menu->url }}</td>
            <td>{{ $menu->parent }}</td>
            <td>{{ $menu->order }}</td>
            <td>{{ $menu->icono }}</td>
            <td>{{ $menu->enabled }}</td>
            <td>
                <a class="btn btn-sm btn-success" href="  {{ route('menus.show', [$menu->id]) }}">
                    <i class="fa fa-search"></i>
                </a>
                <a class="btn btn-sm btn-info" href=" {{ route('menus.edit', [$menu->id]) }}">
                    <i class="fa fa-edit"></i>
                </a>
                <div class='btn-group'>
                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}

                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Realmente desera eliminar el menu $menu->name ?')"]) !!}

                    {!! Form::close() !!}
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deletemodal{{$menu->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar registro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="bodymodal" class="modal-body">
                                Realmente desea eliminar el rol <b>{{$menu->name}}</b> y sus permisos asignados ?
                                recuerde que esta acción es permanente y no se podrá deshacer.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close
                                </button>
                                <form action="{{route('roles.destroy',$menu->id)}}" id="delete{{$menu->id}}"
                                      method="post" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
