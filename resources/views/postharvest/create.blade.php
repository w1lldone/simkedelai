@extends('layouts.master')

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Tambah penanganan</h2>
	</div>
</header>
<!-- Breadcrumb-->
<ul class="breadcrumb">
	<div class="container-fluid">
		<li class="breadcrumb-item"><a href="/harvest">Panen</a></li>
		<li class="breadcrumb-item"><a href="{{ route('harvest.show', $harvest) }}">Detail panen</a></li>
		<li class="breadcrumb-item active">Tambah penanganan</li>
	</div>
</ul>

<div class="content-wrapper">
	<!-- TABLES SECTION  -->
	<section class="forms">
		<div class="container-fluid">
			<div class="row">
				{{-- HORIZONTAL FORM --}}
				<div class="col-md-8 offset-md-2">
					@include('layouts.alerts')
					<div class="card">
						<div class="card-header d-flex align-items-center">
							<h3 class="h4">Form penanganan pasca panen</h3>
						</div>
						<div class="card-body">
							<form class="form-horizontal" method="POST" action="{{ route('postharvest.store') }}">
								{{ csrf_field() }}
								{{-- INPUT HARVEST --}}
								<div class="form-group row {{ $errors->has('harvest_id') ? ' has-danger' : '' }}">
									<label class="col-sm-3 form-control-label">Pemanenan</label>
									<div class="col-sm-9">
										<p class="form-control-static">Panen {{ $harvest->onfarm->name }}</p>
										<input type="hidden" name="harvest_id" value="{{ $harvest->id }}">
									</div>
									@if ($errors->has('harvest_id'))
									  <small class="form-text text-danger">{{ $errors->first('harvest_id') }}</small>
								  @endif
								</div>
								{{-- INPUT NAME --}}
								<div class="form-group row {{ $errors->has('postharvest_id') ? ' has-danger' : '' }}">
									<label class="col-sm-3 form-control-label">Kegiatan</label>
									<div class="col-sm-9">
										<div class="input-group">
											<select class="form-control" name="postharvest_id">
												@foreach ($postharvests as $postharvest)
													<option value="{{ $postharvest->id }}">{{ $postharvest->name }}</option>
												@endforeach
											</select>
										</div>
										@if ($errors->has('postharvest_id'))
										  <small class="form-text text-danger">{{ $errors->first('postharvest_id') }}</small>
										@endif
									</div>
								</div>
								{{-- INPUT DATE --}}
								<div class="form-group row {{ $errors->has('date') ? ' has-danger' : '' }}">
									<label class="col-sm-3 form-control-label">Tanggal</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input value="{{ old('date') }}" data-date-format="yyyy-mm-dd" data-provide="datepicker" type="text" placeholder="Tanggal penanganan" name="date" class="form-control datepicker" required>
											<span class="input-group-addon""><i class="fa fa-calendar"></i></span>
										</div>
										@if ($errors->has('date'))
										  <small class="form-text text-danger">{{ $errors->first('date') }}</small>
										@endif
									</div>
								</div>
								{{-- INPUT COST --}}
								<div class="form-group row {{ $errors->has('cost') ? ' has-danger' : '' }}">
									<label class="col-sm-3 form-control-label">Biaya</label>
									<div class="col-sm-9">
										<div class="input-group">
										  <span class="input-group-addon"">Rp.</span>
											<input value="{{ !empty(old('cost')) ? old('cost') : 0 }}" type="number" placeholder="Kosongkan jika tidak ada biaya" name="cost" class="form-control">
										</div>
										@if ($errors->has('cost'))
										  <small class="form-text text-danger">{{ $errors->first('cost') }}</small>
										@endif
									</div>
								</div>
								<div class="form-group row">       
									<div class="col-sm-9 offset-sm-3">
										<input type="submit" value="Simpan" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


@endsection
