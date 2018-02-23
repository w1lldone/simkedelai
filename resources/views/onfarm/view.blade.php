@extends('layouts.master')

@section('content')
<!-- Page Header-->
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">On farm Kedelai</h2>
  </div>
</header>
<!-- Breadcrumb-->
<ul class="breadcrumb">
  <div class="container-fluid">
    <li class="breadcrumb-item"><a href="/onfarm">On farm</a></li>
    <li class="breadcrumb-item active">Detail</li>
  </div>
</ul>

<div class="content-wrapper">
	<section class="dashboard-counts no-padding-bottom">
	    <div class="container-fluid">
    	  <div class="project">
        @include('layouts.alerts')
            {{-- PORJECT SECTION --}}
            <div class="row bg-white has-shadow mb-2 p-3">
              <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                  {{-- <div class="image has-shadow"><img src="{{ $onfarm->seed->seed_photo->first()->path }}" alt="..." class="img-fluid"></div> --}}
                  <div class="text">
                    <h3 class="h4">{{ $onfarm->name }}</h3><small>{{ $onfarm->user->name }}</small>
                  </div>
                </div>
                <div class="project-date"><span class="hidden-sm-down">dibuat: {{ $onfarm->created_at->toFormattedDateString() }}</span></div>
              </div>
              <div class="col-lg-6 d-flex align-items-center" style="border-right: none;">
                <div class="row p-1">
                  <h4 class="">Luas tanam:</h4>
                  <h4 class="">Total biaya pra-panen:</h4>
                </div>
                <div class="row p-1">
                  <h4 class=""><span class="badge badge-info" style="font-size: inherit;">
                    @if (empty($onfarm->area))
                      Belum ditanam
                    @else
                      {{ $onfarm->area }} m<sup>2</sup>
                    @endif
                  </span></h4>
                  <h4 class=""><span class="badge badge-info" style="font-size: inherit;">Rp. {{ $onfarm->formattedOnfarmCost() }}</span></h4>
                </div>

              </div>
            </div>
            {{-- DATA SECTION --}}
            <div class="row bg-white has-shadow" style="padding: 5px 15px;">
              {{-- SEED --}}
              <div class="statistic col-sm-4" style="margin-bottom: inherit;">
              	@isset ($onfarm->seed)
  	               <div class="icon float-left"><img src="/img/stock/bean.svg" class="img-fluid"></div>
                   <p class="text-right m-0">
                     <strong>{{ $onfarm->seed->quantity }} Kg</strong>
                     {{-- <sup><a title="Edit benih" data-toggle="tooltip" href="/seed/{{$onfarm->seed->id}}/edit"><i class="fa fa-edit"></i></a></sup> --}}
                     <br>
                     <small>Benih digunakan</small>
                     <br>
                     <a href="/seed/{{$onfarm->seed->id}}/edit" class="round-link bg-orange">Edit</a>
                     <a href="/seed/{{$onfarm->seed->id}}/view" class="round-link bg-green">Detail</a>
                   </p>
	               {{-- <div></div> --}}
              	@endisset
              	@empty ($onfarm->seed)
                   <div class="text text-center">
    	               <h3 class="text-light">Benih belum dibeli</h3>
    	               <a class="round-link" href="/seed/create/{{$onfarm->id}}">Beli</a>
                   </div>
              	@endempty
              </div>
              {{-- PLANTED --}}
              <div class="statistic project col-sm-4 clearfix align-items-center" style="margin-bottom: inherit;">
                @isset ($onfarm->planted_at)
                 <div class="icon float-left"><img src="/img/stock/garden-tools.svg" class="img-fluid"></div>
                 <p class="text-right m-0">
                  <strong>{{ $onfarm->planted_at->toFormattedDateString() }}</strong>
                  {{-- <sup><a title="Edit penanaman" data-toggle="tooltip" href="/plant/{{$onfarm->id}}/edit"><i class="fa fa-edit"></i></a></sup> --}}
                  <br>
                  <small>Tanggal tanam</small>
                  <br>
                  <a href="/plant/{{$onfarm->id}}/edit" class="round-link bg-orange">Edit</a>
                 </p>
                @endisset
                @empty ($onfarm->planted_at)
                   <div class="text text-center">
                     <h3 class="text-light">Benih belum ditanam</h3>
                     @isset ($onfarm->seed)
                       <a class="round-link bg-orange" href="" data-toggle="modal" data-target="#plantSeed">tanam</a>
                     @endisset
                     @empty ($onfarm->seed)
                         <small>Lakukan pembelian benih dulu</small>
                     @endempty
                   </div>
                @endempty
              </div>
              {{-- HARVEST --}}
              <div class="statistic project col-sm-4 clearfix align-items-center" style="margin-bottom: inherit; border-right: none;">
              	@isset ($onfarm->harvest)
	               <div class="icon float-left"><img src="/img/stock/garden-tools.svg" class="img-fluid"></div>
                 <p class="text-right m-0">
                  <strong>{{ $onfarm->harvest->harvested_at->toFormattedDateString() }}</strong>
                  {{-- <sup><a title="Edit penanaman" data-toggle="tooltip" href="/plant/{{$onfarm->id}}/edit"><i class="fa fa-edit"></i></a></sup> --}}
                  <br>
                  <small>Tanggal panen</small>
                  <br>
                  <a href="{{ route('harvest.show', $onfarm->harvest) }}" class="round-link bg-green">Detail</a>
                 </p>
              	@endisset
              	@empty ($onfarm->harvest)
                   <div class="text text-center">
    	               <h3 class="text-light">Kedelai belum dipanen</h3>
                     @isset($onfarm->planted_at)
      	               <a class="round-link bg-info" href="/harvest/create?onfarm_id={{$onfarm->id}}">Panen</a>
                     @endisset
                     @empty ($onfarm->planted_at)
                         <small>Lakukan penanaman dulu</small>
                     @endempty
                   </div>
              	@endempty
              </div>
            </div>
          </div>
	    </div>
    </section>

	<section class="dashboard-header pb-0">
      <div class="container-fluid">
        <div class="row">
          {{-- ACTIVITY --}}
          <div class="col-lg-6">
            <div class="articles card">
              {{-- @can('createActivity', $onfarm)
                <div class="card-close">
                  <div class="dropdown">
                    <a href="/activity/create/{{$onfarm->id}}" class="btn btn-sm btn-primary" title="Tambah aktivitas tanam" data-toggle="tooltip"><i class="fa fa-plus fa-fw"></i>Aktifitas tanam</a>
                  </div>
                </div>
              @endcan --}}
              <div class="card-header">
                <h2 class="h3 d-inline">Aktivitas tanam</h2>
                @can('createActivity', $onfarm)
                  <a href="/activity/create/{{$onfarm->id}}" class="btn btn-sm btn-primary float-right" title="Tambah aktivitas tanam" data-toggle="tooltip"><i class="fa fa-plus fa-fw"></i>Aktifitas tanam</a>
                @endcan
              </div>
              <div class="card-body no-padding">
                @if ($onfarm->activity->isEmpty())
                  <div class="pt-2 pb-4 text-center">
                    <img src="/img/stock/watering-can.svg" class="img-fluid" width="150px">
                    <h4 class="text-light text-muted">Belum ada aktivitas tanam</h4>
                    @cannot('createActivity', $onfarm)
                        <p class="text-muted m-0">Lakukan penanaman terlebih dahulu</p>
                    @endcannot
                    @can('createActivity', $onfarm)
                      <a class="round-link bg-green d-inline-block text-white" href="/activity/create/{{$onfarm->id}}">Tambahkan</a>
                    @endcan
                  </div>
                @endif
                <!-- ACTIVITY LIST -->
                @foreach ($onfarm->activity()->orderBy('date')->get() as $activity)
                  <a class="item-link" href="/activity/{{ $activity->id }}/view">
                    <div class="item d-flex align-items-center py-2">
                      <div class="image"><img src="/img/stock/watering-can.svg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="text">
                          <h3 class="h5">{{ $activity->name }}</h3><small>{{ $activity->date->format('j F Y') }}.   </small>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
          </div>

          {{-- COST --}}
          <div class="col-lg-6">
            <div class="recent-updates card">
              {{-- <div class="card-close">
                <div class="dropdown">
                  <a href="/onfarmcost/create/{{ $onfarm->id }}" class="btn btn-sm btn-primary" title="Tambah biaya onfarm" data-toggle="tooltip" data-placement="left"><i class="fa fa-plus fa-fw"></i>Biaya</a>
                </div>
              </div> --}}
              <div class="card-header">
                <h3 class="h4 d-inline">Biaya tanam</h3>
                <a href="/onfarmcost/create/{{ $onfarm->id }}" class="btn btn-sm btn-primary float-right" title="Tambah biaya onfarm" data-toggle="tooltip" data-placement="left"><i class="fa fa-plus fa-fw"></i>Biaya</a>
              </div>
              <div class="card-body no-padding">
                @if ($onfarm->seed == null && $onfarm->cost->count() == 0)
                  <div class="item pt-2 pb-4 text-center">
                    <img src="/img/stock/shop_shopping.svg" class="img-fluid" width="150px">
                    <h4 class="text-light text-muted">Belum ada biaya tanam</h4>
                    <a class="round-link bg-green d-inline-block text-white" href="/onfarmcost/create/{{$onfarm->id}}">Tambahkan</a>
                  </div>
                @endif
                <!-- COST LIST -->
                @foreach ($onfarm->cost as $cost)
                  <a href="/onfarmcost/{{ $cost->id }}/view" class="item-link">
                    <div class="item d-flex justify-content-between">
                      <div class="info d-flex">
                        <div class="icon"><i class="fa fa-shopping-bag text-muted"></i></div>
                        <div class="title">
                          <h5>Rp. {{ $cost->formattedPrice() }}</h5>
                          <p>{{ $cost->name." - ".$cost->description }}</p>
                        </div>
                      </div>
                    </div>
                  </a>
                @endforeach
                @if (!empty($onfarm->seed))
                  <!-- SEED COST -->
                  <a href="/seed/{{ $onfarm->seed->id }}/view" class="item-link">
                    <div class="item d-flex justify-content-between">
                      <div class="info d-flex">
                        <div class="icon"><i class="fa fa-shopping-bag text-muted"></i></div>
                        <div class="title">
                          <h5>Rp. {{ $onfarm->formattedSeedCost() }}</h5>
                          <p>{{ $onfarm->seed->name }}</p>
                        </div>
                      </div>
                      <div class="date text-right"><strong>24</strong><span>May</span></div>
                    </div>
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection

@section('modal')
  @isset ($onfarm->seed)
    @include('onfarm.modal')
  @endisset
@endsection

@section('script')

@endsection
