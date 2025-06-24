@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Usuarios</h1>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cuentas y roles de usuario</h5>
                            <!-- Table with stripped rows -->
                            <a href="" class="btn btn-primary">
                                <i class="fa-solid fa-user-plus"></i>
                                Agregar nuevo usuario
                            </a>
                            <hr>
                            <table class="table datatable">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Cambio contraseña</th>
                                        <th>Activo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="text-center">
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->rol}}</td>
                                            <td>
                                                <a href="" class="btn btn-success">
                                                    <i class="fa-solid fa-user-lock"></i>
                                                </a>
                                            </td>
                                            <td>
                                                @if ($item->activo)
                                                    <i class="fa-solid fa-square-check fa-xl"
                                                    style="color: #32a330;"></i>
                                                @else
                                                    <i class="fa-solid fa-square-xmark fa-xl"
                                                    style="color: #d40823;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fa-solid fa-user-gear"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
