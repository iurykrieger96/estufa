<!-- resources/views/reports/ambient.blade.php -->
@extends('layouts.dashboard')

@section('title','Relatórios de Ambientes')

@section('page_title','Relatórios')

@section('page_subtitle','Ambientes')

@section('breadcrumb')
	<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><i class="fa fa-file-pdf-o"></i> Relatórios</li>
	<li class="active">Ambientes</li>
@endsection

@section('content')

<!-- Filter Box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-search"></i> Filtros</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
		{!! Form::open(['method' => 'POST','url' => 'admin/report/ambient', 'class' => 'action-form form-inline', 'id' => 'form-dates']) !!}
		<div class="box-header">
			<h3 class="box-title">PERÍODO</h3><br>
		</div>
		<div class="box-body">
			<div class="form-group">
				{!! Form::label('initialDate', ' De ', ['class' => 'control-label']) !!}
				{!! Form::input('date','initialDate', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('endDate', ' até ', ['class' => 'control-label']) !!}
				{!! Form::input('date','endDate', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
			</div> 
		</div>
		<hr>
		<div class="box-header">
			<h3 class="box-title">LIMITE DE REGISTROS</h3><br>
		</div>
		<div class="box-body">
			<div class="form-group">
				<select id="dropdown" name="limit" aria-controls="limit" class="form-control input-sm" style="width: 150px">
					<option value="">-- ILIMITADO --</option>
					@for ($i = 3000; $i >= 50; $i = $i - 50)
					<option value="{{ $i }}">{{ $i }}</option>
					@endfor 
				</select>
			</div>    
		</div>
		<hr>
		{!! Form::button('<i class="fa fa-file-pdf-o"></i> Gerar Relatório', ['class' => 'btn btn-primary btn-flat pull-right', 'id' => 'btn-search', 'type' => 'submit']) !!}
		{!! Form::close() !!}
	</div>

	<!-- /.box-body -->
</div>
<!-- /.box -->

@endsection

@section('scripts')

@endsection
