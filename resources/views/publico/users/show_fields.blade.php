
<table class="table">
    <tbody>
        @if($user->tipo_identificacion !="")
        <tr>
            <th class="bg-light">Tipo de identificación</th>
            <td>{{ $user->tipo_identificacion }}</td>
        </tr>
        @endif
        @if($user->numero_identificacion !="")
        <tr>
            <th class="bg-light">Numero de identificación</th>
            <td>{{ $user->numero_identificacion }}</td>
        </tr>
        @endif
        @if($user->email !="")
        <tr>
            <th class="bg-light" style="width:25%">Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        @endif
        @if($user->nombres !="")
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $user->nombres }}</td>
        </tr>
        @endif
        
        @if($user->tipo_identificacion!='rif')
            @if($user->apellidos !="")
            <tr>
                <th class="bg-light">Apellidos</th>
                <td>{{ $user->apellidos }}</td>
            </tr>
            @endif
            @if($user->iniciales !="")
            <tr>
                <th class="bg-light">Iniciales</th>
                <td>{{ $user->iniciales }}</td>
            </tr>
            @endif
            @if($user->fecha_nacimiento !="")
            <tr>
                <th class="bg-light">Fecha de nacimiento</th>
                <td>{{ $user->fecha_nacimiento }}</td>
            </tr>
            @endif
         
        @endif
            @if($user->telefono !="")
        <tr>
            <th class="bg-light">Teléfono</th>
            <td>{{ $user->telefono }}</td>
        </tr>
        @endif
            @if($user->direccion !="")
        <tr>
            <th class="bg-light">Dirección</th>
            <td>{{ $user->direccion }}</td>
        </tr>
        @endif
            @if($user->tipo_usuario !="")
        <tr>
            <th class="bg-light">Tipo de usuario</th>
            <td>{{ $user->tipo_usuario }}</td>
        </tr>
        @endif
    </tbody>
</table>
