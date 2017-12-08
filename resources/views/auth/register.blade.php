@extends('layouts.master-plain')

@section('content')
  <div class="page login-page">
    <div class="container d-flex align-items-center">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              <div class="form-group mb-5">
                <h3>Pendaftaran anggota baru</h3>
              </div>
              @include('layouts.alerts')

              {{ csrf_field() }}
              {{-- INPUT NAME --}}
              <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="col-sm-3 form-control-label">Nama</label>
                <div class="col-sm-9">
                  <input name="name" id="inputHorizontalSuccess" type="text" placeholder="Nama lengkap" class="form-control form-control-success" value="{{ old('name') }}" required>
                  @if ($errors->has('name'))
                  <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                  @endif
                </div>
              </div>
              {{-- INPUT EMAIL --}}
              <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                <label class="col-sm-3 form-control-label">Email</label>
                <div class="col-sm-9">
                  <input name="email" id="inputHorizontalSuccess" type="email" placeholder="email@contoh.com" class="form-control form-control-success " value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                  <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                  @endif
                </div>
              </div>
              {{-- INPUT ADDRESS --}}
              <div class="form-group row {{ $errors->has('address') ? ' has-danger' : '' }}">
                <label class="col-sm-3 form-control-label">Alamat</label>
                <div class="col-sm-9">
                  <input name="address" id="inputHorizontalSuccess" type="text" placeholder="Alamat lengkap" class="form-control form-control-success " value="{{ old('address') }}" required>
                  @if ($errors->has('address'))
                  <small class="form-text text-danger">{{ $errors->first('address') }}</small>
                  @endif
                </div>
              </div>
              {{-- INPUT CONTACT --}}
              <div class="form-group row {{ $errors->has('contact') ? ' has-danger' : '' }}">
                <label class="col-sm-3 form-control-label">No Hp</label>
                <div class="col-sm-9">
                  <input name="contact" id="inputHorizontalSuccess" type="text" placeholder="0812306*****" class="form-control form-control-success " value="{{ old('contact') }}" required>
                  @if ($errors->has('contact'))
                  <small class="form-text text-danger">{{ $errors->first('contact') }}</small>
                  @endif
                </div>
              </div>
              {{-- INPUT PASSWORD --}}
              <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                <label class="col-sm-3 form-control-label">Password</label>
                <div class="col-sm-9">
                  <input name="password" id="inputHorizontalSuccess" type="password" placeholder="password" class="form-control form-control-success " required>
                  @if ($errors->has('password'))
                  <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                  @endif
                </div>
              </div>
              {{-- INPUT PASSWORD CONFIRMATION --}}
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Ulangi password</label>
                <div class="col-sm-9">
                  <input name="password_confirmation" id="inputHorizontalSuccess" type="password" placeholder="Ulangi password" class="form-control form-control-success" required>
                </div>
              </div>
              {{-- INPUT PRIVILAGES --}}
              <div class="form-group row {{ $errors->has('privilage_id') ? ' has-danger' : '' }}">
                <label id="select" class="col-sm-3 form-control-label">Pekerjaan</label>
                <div class="col-sm-9">
                  <select id="privilage" name="privilage_id" class="form-control">
                    <option value="">PILIH PEKERJAAN</option>
                    @foreach (\App\Privilage::where('name', '<>', 'admin')->get() as $privilage)
                    <option value="{{ $privilage->id }}">{{ $privilage->name }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('privilage_id'))
                  <small class="form-text text-danger">{{ $errors->first('privilage_id') }}</small>
                  @endif
                </div>
              </div>
              {{-- HIDDEN INPUT POKTAN --}}
              <div id="selectPoktan" class="form-group row" style="display: none;">
                <label class="col-sm-3 form-control-label">Kelompok tani</label>
                <div class="col-sm-9">
                  <select name="poktan_id" class="form-control">
                    <option value="">PILIH KELOMPOK TANI</option>
                    @foreach (\App\Poktan::all() as $poktan)
                    <option value="{{ $poktan->id }}">{{ $poktan->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">       
                <div class="col-sm-9 offset-sm-3">
                  <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyrights text-center">
      <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
      <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $('#privilage').change(function() {
      if ($(this).val() === '2') {
        $('#selectPoktan').show()
      } else{
        $('#selectPoktan').hide()
      }
    });
  </script>
@endsection
