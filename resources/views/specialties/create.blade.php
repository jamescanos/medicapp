@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva Especialidad</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/especialidades') }}" class="btn btn-sm btn-info">
                <i class="fas fa-chevron-left"></i>&nbsp;Regresar
              </a>
            </div>
          </div>
        </div>
        
        <div class="card-body">

          @if($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                <span class="alert-text"><strong>Error!</strong> {{ $error }}</span>
              </div>
            @endforeach
          @endif

          <form action="{{ url('/especialidades') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nombre Especialidad</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autocomplete="off">
            </div>

            <div class="form-group">
              <label for="description">Descripci&oacute;n</label>
              <input type="text" name="description" class="form-control" value="{{ old('description') }}" autocomplete="off"/>
            </div>

            <button type="submit" class="btn btn-sm btn-success">Crear Especialidad</button>

          </form>

        </div>

      </div>

@endsection
