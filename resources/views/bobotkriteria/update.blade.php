@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Data Bobot Kriteria</h3>
            <form action="/bobotkriteria/{{ $bobotkriteria->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="id_tahun_usulan">Tahun Usulan<span style="color:red;">*</span></label>
                    <select class="form-control @error('id_tahun_usulan') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="id_tahun_usulan" id="id_tahun_usulan"
                        value="{{ old('id_tahun_usulan') }}">
                        <option value="{{ $bobotkriteria->id_tahun_usulan }}">{{ $bobotkriteria->tahun }}</option>
                        @foreach ($thusulan as $thusulann)
                            <option value="{{ $thusulann->id }}">{{ $thusulann->tahun }}</option>
                        @endforeach
                    </select>
                    @error('id_tahun_usulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot_kepribadian">Bobot Kepribadian<span style="color:red;">*</span></label>
                    <input type="text" name="bobot_kepribadian"
                        class="form-control @error('bobot_kepribadian') is-invalid @enderror" id="bobot_kepribadian"
                        placeholder="Bobot Kepribadian" required
                        value="{{ old('bobot_kepribadian', $bobotkriteria->bobot_kepribadian) }}">
                    @error('bobot_kepribadian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot_ipk">Bobot IPK<span style="color:red;">*</span></label>
                    <input type="text" name="bobot_ipk" class="form-control @error('bobot_ipk') is-invalid @enderror"
                        id="bobot_ipk" placeholder="Bobot IPK" required
                        value="{{ old('bobot_ipk', $bobotkriteria->bobot_ipk) }}">
                    @error('bobot_ipk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot_prestasi">Bobot Prestasi<span style="color:red;">*</span></label>
                    <input type="text" name="bobot_prestasi"
                        class="form-control @error('bobot_prestasi') is-invalid @enderror" id="bobot_prestasi"
                        placeholder="Bobot Prestasi" required
                        value="{{ old('bobot_prestasi', $bobotkriteria->bobot_prestasi) }}">
                    @error('bobot_prestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobot_penghasilan">Bobot Penghasilan<span style="color:red;">*</span></label>
                    <input type="text" name="bobot_penghasilan"
                        class="form-control @error('bobot_penghasilan') is-invalid @enderror" id="bobot_penghasilan"
                        placeholder="Bobot Penghasilan" required
                        value="{{ old('bobot_penghasilan', $bobotkriteria->bobot_penghasilan) }}">
                    @error('bobot_penghasilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                    Simpan
                </button>
                <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                    Kembali
                </button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
