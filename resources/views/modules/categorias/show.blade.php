@extends('layouts.main')

@section('titulo', $titulo ?? 'Categorias')

@section('contenido')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Eliminar Categoria??</h1>

        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Nueva categoria</h5> --}}
                            <form action="{{ route('categorias.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <label for="nombre">Nombre de categoria</label>
                                <input type="text" class="form-control mt-3" id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre de la categoria" readonly value="{{ $item->nombre }}">
                                <button class="btn btn-danger mt-3">eliminar</button>
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
