<!-- resources/views/index.blade.php -->
@extends('layouts.dashboard')

@section('title','Leituras por Sensor')

@section('page_title','Leituras')

@section('page_subtitle','Leituras por Sensor')

@section('breadcrumb')
    <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><i class="fa fa-tasks"></i> Leituras</li>
    <li class="active">Leituras por Sensor</li>
@endsection

@section('content')

<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-tasks"></i> Leituras por Sensor</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        
      </div>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="col-sm-6">
				<div class="dataTables_length" id="scans_length">
					<label>
						Leituras do sensor 
						<select id="dropdown" name="paginate" aria-controls="scans" class="form-control input-sm" style="width: 150px">
							@foreach ($sensors as $sensor)
							<option value="{{ $sensor->id_sensor }}" {{ ($sensor == $selected_sensor ? "selected":"") }}>{{ $sensor->id_sensor . " - " . $sensor->description }}</option>
							@endforeach
						</select>
					</label>
				</div>
			</div>
		</div>

		<table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Data</th>
					<th>Hora</th>
					<th>Temperatura</th>
					<th>Umidade do Ar</th>
					<th>Umidade do Solo</th>
					<th>Sensor</th>
					<th>Ambiente</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Data</th>
					<th>Hora</th>
					<th>Temperatura</th>
					<th>Umidade do Ar</th>
					<th>Umidade do Solo</th>
					<th>Sensor</th>
					<th>Ambiente</th>
					<th>Ações</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($scans as $scan)
				<tr>
					<td>{{ $scan->date->format('d/m/Y') }}</td>
					<td>{{ $scan->time }}</td>
					<td>{{ $scan->temperature }} ºC</td>
					<td>{{ $scan->air_humidity }} %</td>
					<td>{{ $scan->ground_humidity }} %</td>
					<td><a href="{{url('admin/sensor/'.$scan->sensor->id_sensor)}}">{{ $scan->sensor->id_sensor." - ".$scan->sensor->description }}</a></td>
					<td><a href="{{url('admin/ambient/'.$scan->ambient->id_ambient)}}">{{ $scan->ambient->id_ambient." - ".$scan->ambient->description}}</a></td>
					<td>
						<!-- Show Button -->
		                <a href="{{ url('admin/scan/'.$scan->id_scan) }}"><button type="button" class="btn btn-primary btn-flat"><i class="fa fa-eye"></i> Visualizar</button></a>
		                
		                <!-- Destroy Form Button -->
		                @if (Auth::user()->isAdmin())
			                {!! Form::open(['method' => 'DELETE','url' => 'admin/scan/'.$scan->id_scan, 'class' => 'action-form inline', 'id' => 'form-delete']) !!}
			                {!! csrf_field() !!}
			                {!! Form::button('<i class="fa fa-times"></i> Remover', ['class' => 'btn btn-danger btn-flat', 'id' => 'btn-delete', 'type' => 'submit', 'onClick' => 'confirmDelete()']) !!}
			                {!! Form::close() !!}
			            @endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $scans->render() !!}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection

@section('scripts')

<!-- DataTables -->
@include('common.dataTables')

<!-- Sensor Dropdown -->
@include('common.dynamicDropdown',['baseRoute' => 'admin/scan/sensor'])

@endsection