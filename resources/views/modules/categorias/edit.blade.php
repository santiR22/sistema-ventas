@extends('layouts.main')

@section('titulo', $titulo ?? 'Categorias')

@section('contenido')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar categoria</h1>

        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categorias.update', $item->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <label for="nombre">Nombre de categoria</label>
                                <input type="text" class="form-control mt-3"
                                    id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre de la categoria"
                                    required value="{{ $item->nombre }}">
                                <button class="btn btn-primary mt-3">Actualizar</button>
                                <a href="{{ route('categorias') }}" class="btn btn-info mt-3">
                                    Cancelar
                                </a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
