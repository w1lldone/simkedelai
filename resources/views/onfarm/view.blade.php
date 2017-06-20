@extends('layouts.master')

@section('sidebar')
	@include('layouts.sidebar')
@endsection

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
              <div class="right-col col-lg-6 d-flex align-items-center justify-content-between" style="border-right: none;">
                  <h4 class="my-0">Total biaya pra-panen:</h4>
                  <h4 class="my-0"><span class="badge badge-info" style="font-size: inherit;">Rp. 503.000</span></h4>
              </div>
            </div>
            {{-- DATA SECTION --}}
            <div class="row bg-white has-shadow" style="padding: 5px 15px;">
              {{-- <div class="col-lg-4 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center pt-4 py-4">
                  <div class="text">
                    <h3 class="text-light">{{ $onfarm->name }}</h3><small>{{ $onfarm->user->name }}, {{ $onfarm->user->poktan->name }}</small>
                  </div>
                </div>
              </div> --}}
              <div class="statistic col-sm-4 clearfix align-items-center" style="margin-bottom: inherit;">
              	@isset ($onfarm->seed)
	               <div class="icon bg-green float-left"><i class="fa fa-line-chart"></i></div>
                 <a title="Klik untuk detail benih" data-toggle="tooltip" class="text text-right float-right" href="/seed/{{$onfarm->seed->id}}/view">
                   <strong>{{ $onfarm->seed->quantity }} Kg</strong><br><small>Benih digunakan</small>
                 </a>
	               {{-- <div></div> --}}
              	@endisset
              	@empty ($onfarm->seed)
                   <div class="text text-center">
    	               <h3 class="text-light">Benih belum dibeli</h3>
    	               <a class="round-link" href="/seed/create/{{$onfarm->id}}">Beli</a>
                   </div>
              	@endempty
              </div>
              <div class="statistic project col-sm-4 clearfix align-items-center" style="margin-bottom: inherit;">
                @isset ($onfarm->planted_at)
                 <div class="icon bg-orange float-left"><i class="fa fa-calendar-o"></i></div>
                 <div class="text text-right float-right"><strong>{{ $onfarm->planted_at->toFormattedDateString() }}</strong><br><small>Tanggal tanam</small></div>
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
              <div class="statistic project col-sm-4 clearfix align-items-center" style="margin-bottom: inherit; border-right: none;">
              	@isset ($onfarm->harvest)
	               <div class="icon bg-orange float-left"><i class="fa fa-calendar-o"></i></div>
	               <div class="text text-right float-right"><small>Tanggal tanam</small><br><strong>{{ $onfarm->planted_at->toFormattedDateString() }}</sup></strong></div>
              	@endisset
              	@empty ($onfarm->harvest)
                   <div class="text text-center">
    	               <h3 class="text-light">Kedelai belum dipanen</h3>
                     @isset ($onfarm->planted_at)
      	               <a class="round-link bg-info" href="" data-toggle="modal" data-target="#harvest">Panen</a>
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
              @can('createActivity', $onfarm)
                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow">
                      <a href="/activity/create/{{$onfarm->id}}" class="dropdown-item edit"> <i class="fa fa-plus"></i>Aktivitas tanam</a>
                    </div>
                  </div>
                </div>
              @endcan
              <div class="card-header d-flex align-items-center">
                <h2 class="h3">Aktivitas tanam   </h2>
                <div class="badge badge-rounded bg-green">4 New</div>
              </div>
              <div class="card-body no-padding">
                @if ($onfarm->activity->isEmpty())
                  <div class="py-4 text-center">
                    <h4 class="text-light text-muted">Belum ada aktivitas tanam</h4>
                    @cannot('createActivity', $onfarm)
                        <p class="text-muted m-0">Lakukan penanaman terlebih dahulu</p>
                    @endcannot
                    @can('createActivity', $onfarm)
                      <a class="round-link bg-green d-inline-block text-white" href="/activity/create/{{$onfarm->id}}">Tambahkan</a>
                    @endcan
                  </div>
                @endif
                @foreach ($onfarm->activity as $activity)
                  <div class="item d-flex align-items-center">
                    <div class="image"><img src="{{ empty($activity->photo) ? "/img/logo/logo-only.svg" : $activity->photo }}" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="text"><a href="#">
                        <h3 class="h5">{{ $activity->name }}</h3></a><small>Posted on {{ $activity->date->toFormattedDateString() }}.   </small>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          {{-- COST --}}
          <div class="col-lg-6">
            <div class="recent-updates card">
              <div class="card-close">
                <div class="dropdown">
                  <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard" class="dropdown-menu has-shadow">
                    <a href="/cost/create/{{ $onfarm->id }}" class="dropdown-item edit"> <i class="fa fa-plus"></i>Biaya tanam</a>
                  </div>
                </div>
              </div>
              <div class="card-header">
                <h3 class="h4">Biaya tanam</h3>
              </div>
              <div class="card-body no-padding">
                <!-- Item-->
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h5>Lorem ipsum dolor sit amet.</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                    </div>
                  </div>
                  <div class="date text-right"><strong>24</strong><span>May</span></div>
                </div>
                <!-- Item-->
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h5>Lorem ipsum dolor sit amet.</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                    </div>
                  </div>
                  <div class="date text-right"><strong>24</strong><span>May</span></div>
                </div>
                <!-- Item        -->
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h5>Lorem ipsum dolor sit amet.</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                    </div>
                  </div>
                  <div class="date text-right"><strong>24</strong><span>May</span></div>
                </div>
                <!-- Item-->
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h5>Lorem ipsum dolor sit amet.</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                    </div>
                  </div>
                  <div class="date text-right"><strong>24</strong><span>May</span></div>
                </div>
                <!-- Item-->
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h5>Lorem ipsum dolor sit amet.</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                    </div>
                  </div>
                  <div class="date text-right"><strong>24</strong><span>May</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection

@section('modal')
  @include('onfarm.modal')
@endsection

@section('script')

@endsection
