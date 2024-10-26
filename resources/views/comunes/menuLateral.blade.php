<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!--GRUPO 1-->
                <div class="sb-sidenav-menu-heading">AULA DE REFERENCIA 2.10</div>
                <a class="nav-link" href="{{url("/")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-house"></i></div>
                    Inicio
                </a>
                <a class="nav-link" href="{{url("/panel/medios-drive")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-brands fa-google-drive"></i></div>
                    Archivo Medios
                </a>
                <!--GRUPO 2-->
                <div class="sb-sidenav-menu-heading">Usuarios</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user"></i></div>
                    Personal
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url("/panel/personal")}}">Personal</a>
                        <a class="nav-link" href="{{url("/panel/personal/gestion-usuarios")}}">Gestión usuarios</a>
                        <a class="nav-link" href="{{url("/panel/roles")}}">Roles</a>
                    </nav>
                </div>
                <!--GRUPO 3-->
                <div class="sb-sidenav-menu-heading">TAREAS</div>
                <a class="nav-link" href="{{url("/panel/cuadrante-tareas")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-list-check"></i></div>
                    Cuadrante de tareas
                </a>
                <!--GRUPO 4-->
                <div class="sb-sidenav-menu-heading">SEMANA CULTURAL</div>
                <a class="nav-link" href="{{url("/panel/cuadrante-turnos/")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Cuadrante de turnos
                </a>
                <a class="nav-link" href="{{url("/panel/chat/")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Comunicaciones
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Sesión iniciada como:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>