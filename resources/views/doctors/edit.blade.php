<?php 
  use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar  M&eacute;dico</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/medicos') }}" class="btn btn-sm btn-info">
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

          <form action="{{ url('/medicos/'.$doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nombre  M&eacute;dico</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" required autocomplete="off">
            </div>

            <div class="form-group">
              <label for="email">Correo Electr&oacute;nico</label>
              <input type="text" name="email" class="form-control" value="{{ old('email', $doctor->email) }}" autocomplete="off"/>
            </div>

            <div class="form-group">
                <label for="cedula">Documento de Identidad</label>
                <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $doctor->cedula) }}" autocomplete="off"/>
            </div>

            <div class="form-group">
                <label for="address">Direcci&oacute;n</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $doctor->address) }}" autocomplete="off"/>
            </div>

            <div class="form-group">
                <label for="phone">Tel&eacute;fono / M&oacute;vil</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}" autocomplete="off"/>
            </div>

            <div class="form-group">
              <label for="password">Contrase&ntilde;a</label>
              <input type="text" name="password" class="form-control"autocomplete="off"/>
              <small class="text-warning">Diligencie el campo solo si desea cambiar la contrase&ntilde;a</small>
            </div>

            <button type="submit" class="btn btn-sm btn-success">Editar M&eacute;dico</button>

          </form>

        </div>

      </div>

@endsection
