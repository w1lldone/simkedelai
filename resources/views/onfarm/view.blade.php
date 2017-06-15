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
            <div class="row bg-white has-shadow" style="padding: 5px 15px;">
              <div class="col-lg-4 d-flex align-items-center justify-content-between">
                <div class="project-title d-flex align-items-center">
                  {{-- <div class="image has-shadow"><img src="/img/project-1.jpg" alt="..." class="img-fluid"></div> --}}
                  <div class="text">
                    <h3 class="h4">Tanam kedelai bulan juli</h3><small>Lorem Ipsum Dolor</small>
                  </div>
                </div>
                <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
              </div>
              <div class="statistic col-lg-4 clearfix align-items-center" style="margin-bottom: inherit;">
               <div class="icon bg-green float-left"><i class="fa fa-line-chart"></i></div>
               <div class="text float-right"><strong>700 m<sup>2</sup></strong><br><small>Luas Lahan</small></div>
              </div>
              <div class="statistic col-lg-4 clearfix align-items-center" style="border-right: none; margin-bottom: inherit;">
               <div class="icon bg-orange float-left"><i class="fa fa-calendar-o"></i></div>
               <div class="text float-right"><strong>27 Mei, 2017</sup></strong><br><small>Tanggal tanam</small></div>
              </div>

            </div>
          </div>
	    </div>
  </section>
</div>


@endsection
