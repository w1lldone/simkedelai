@extends('layouts.master')

@section('content')
<!-- Page Header-->
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Anggota</h2>
  </div>
</header>
<!-- Breadcrumb-->
{{-- <ul class="breadcrumb">
  <div class="container-fluid">
    <li class="breadcrumb-item active">Anggota</li>
  </div>
</ul> --}}

<div class="content-wrapper">
	<!-- TABLES SECTION  -->
	<section class="tables">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
				@include('layouts.alerts')
					@if ($inactives->isNotEmpty())
				    <div class="card">
				    	<div class="card-header bg-warning text-white">
				    		<h3 class="h4 d-inline">Anggota belum aktif</h3>
				    	</div>
				    	<div class="card-body table-responsive">
				    		<table class="table table-hover">
				    			<thead>
				    				<tr>
				    					<th>Nama</th>
				    					<th>Sebagai</th>
				    					<th>Kontak</th>
				    					<th>Alamat</th>
				    					<th>Tindakan</th>
				    				</tr>
				    			</thead>
				    			<tbody>
					    			@foreach ($inactives as $user)
					    				<tr>
					    					<td><b>{{ $user->name }}</b></td>
					    					<td>{{ $user->privilage->name }}</td>
					    					<td>{{ $user->contact }}</td>
					    					<td>{{ $user->address }}</td>
					    					<td>
					    						<form action="/user/{{ $user->id }}/activate"	method="POST">
					    							{{ csrf_field() }}
					    							{{ method_field('PUT') }}
					    							<button class="btn btn-success" onclick="return confirm('Apakah anda akan mengaktifkan pengguna?')" name="value" type="submit" value="1">Aktifkan</button>
					    							<button class="btn btn-danger" onclick="return confirm('Apakah anda akan menghapus pengguna?')" name="value" type="submit" value="0">Hapus</button>
					    						</form>
					    					</td>
					    				</tr>
					    			@endforeach
				    			</tbody>
				    		</table>
				    	</div>
				    </div>
					@endif
					
					<div class="card">
					  <div class="card-header">
					    <h3 class="h4 d-inline">Daftar Anggota Aktif</h3>
				      <a href="/user/create/" class="btn btn-sm btn-primary float-right" title="Tambah anggota" data-toggle="tooltip"><i class="fa fa-plus fa-fw"></i>Anggota</a>
					  </div>
					  <div class="card-body table-responsive">
					    <table class="table table-hover">
					      <thead>
					        <tr>
					          <th>#</th>
					          <th>Nama</th>
					          <th>Email</th>
					          <th>Kontak</th>
					          <th>Kewenangan</th>
					          <th>Action</th>
					        </tr>
					      </thead>
					      <tbody>
					      	@foreach ($users as $user)
				      		  <tr>
					      	    <th scope="row">{{ $loop->index+1 }}</th>
					      	    <td>{{ $user->name }}</td>
					      	    <td>{{ $user->email }}</td>
					      	    <td>{{ $user->contact }}</td>
					      	    <td>{{ $user->privilage->name }}</td>
					      	    <td style="display: flex;">
					      			<div class="btn-group">
					      			  <button class="btn btn-secondary btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-caret-down"></i></button>
					      			  <div class="dropdown-menu dropdown-menu-right">
					      			  	<a href="/user/{{$user->id}}/edit" class="dropdown-item">Edit</a>
					      			  	<a href="/user/{{$user->id}}/edit?data=email" class="dropdown-item">Ganti email</a>
					      			  	<a href="/user/{{$user->id}}/edit?data=password" class="dropdown-item">Ganti password</a>
					      			  </div>
					      			</div>
					      	    </td>
					      	  </tr>
					      	@endforeach
					      </tbody>
					    </table>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


@endsection
