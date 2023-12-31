@extends('layouts.panel')

@section('content')
    <form action="{{ url('/horario') }}" method="POST">
        @csrf
        <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Gestionar Horario</h3>
                </div>
                <div class="col text-right">
                  <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
                </div>
              </div>
            </div>
    
            <div class="card-body">
                @if(session('notification'))
    
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                @endif
            </div>
    
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">D&iacute;a</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Turno ma&ntilde;ana</th>
                    <th scope="col">Turno tarde</th>                
                  </tr>
                </thead>
                <tbody>
                   
                    @foreach ($horarios as $key => $horario)
                        <tr>
                            <th>{{ $days[$key] }}</th>
                            <td>
                                <label class="custom-toggle">
                                    <input type="checkbox" name="active[]" value="{{ $key }}" 
                                        @if($horario->active) checked @endif
                                    >
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select name="morning_start[]" class="form-control">
                                            @for ($i=8; $i<=11; $i++)
                                                <option value="{{ $i }}:00"
                                                    @if ($i.':00 AM' == $horario->morning_start) selected @endif
                                                >{{ $i }}:00 AM</option>
                                                <option value="{{ $i }}:30"
                                                    @if ($i.':30 AM' == $horario->morning_start) selected @endif
                                                >{{ $i }}:30 AM</option>
                                            @endfor
                                        </select>
                                    </div>
    
                                    <div class="col">
                                        <select name="morning_end[]" class="form-control">
                                            @for ($i=8; $i<=11; $i++)
                                                <option value="{{ $i }}:00"
                                                    @if ($i.':00 AM' == $horario->morning_end) selected @endif
                                                >{{ $i }}:00 AM</option>
                                                <option value="{{ $i }}:30"
                                                    @if ($i.':30 AM' == $horario->morning_end) selected @endif
                                                >{{ $i }}:30 AM</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
    
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select name="afternoon_start[]" class="form-control">
                                            @for ($i=2; $i<=6; $i++)
                                                <option value="{{ $i+12 }}:00"
                                                    @if ($i.':00 PM' == $horario->afternoon_start) selected @endif
                                                >{{ $i }}:00 PM</option>
                                                <option value="{{ $i+12 }}:30"
                                                    @if ($i.':30 PM' == $horario->afternoon_start) selected @endif
                                                >{{ $i }}:30 PM</option>
                                            @endfor
                                        </select>
                                    </div>
    
                                    <div class="col">
                                        <select name="afternoon_end[]" class="form-control">
                                            @for ($i=2; $i<=6; $i++)
                                                <option value="{{ $i+12 }}:00"
                                                    @if ($i.':00 PM' == $horario->afternoon_end) selected @endif
                                                >{{ $i }}:00 PM</option>
                                                <option value="{{ $i+12 }}:30"
                                                    @if ($i.':30 PM' == $horario->afternoon_end) selected @endif
                                                >{{ $i }}:30 PM</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
    
                            </td>
                        </tr>
                    @endforeach
    
                </tbody>
              </table>
            </div>
    
          </div>

    </form>
      

@endsection
