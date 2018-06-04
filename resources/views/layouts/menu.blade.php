<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{!! route('admin.clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
</li>


<li class="{{ Request::is('prestamos*') ? 'active' : '' }}">
    <a href="{!! route('admin.prestamos.index') !!}"><i class="fa fa-edit"></i><span>Prestamos</span></a>
</li>


<li class="{{ Request::is('pagos*') ? 'active' : '' }}">
    <a href="{!! route('admin.pagos.index') !!}"><i class="fa fa-edit"></i><span>Pagos</span></a>
</li>

@role("admin")
<li class="{{ (Request::is('admin/puestoTrabajos*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Configuracion</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-edit"></i><span>Permisos</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('admin.roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>

        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
        </li>


        <li class="{{ Request::is('amortizacions*') ? 'active' : '' }}">
            <a href="{!! route('admin.amortizacions.index') !!}"><i
                        class="fa fa-edit"></i><span>Amortizacions</span></a>
        </li>

        <li class="{{ Request::is('modalidadPagos*') ? 'active' : '' }}">
            <a href="{!! route('admin.modalidadPagos.index') !!}"><i class="fa fa-edit"></i><span>Modalidad Pagos</span></a>
        </li>

        <li class="{{ Request::is('estadoPrestamos*') ? 'active' : '' }}">
            <a href="{!! route('admin.estadoPrestamos.index') !!}"><i
                        class="fa fa-edit"></i><span>Estado Prestamos</span></a>
        </li>

        <li class="{{ Request::is('formaPagos*') ? 'active' : '' }}">
            <a href="{!! route('admin.formaPagos.index') !!}"><i class="fa fa-edit"></i><span>Forma Pagos</span></a>
        </li>

    </ul>
</li>
@endrole


