@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Nilai Mahasiswa</h3>
            <form action="/nilaimahasiswa/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM<span style="color:red;">*</span></label>
                    <select class="form-control @error('nim') is-invalid @enderror" tabindex="-1" aria-hidden="true"
                        name="nim" id="nim" value="{{ old('nim') }}">
                        @foreach ($mhs as $mahasiswa)
                            <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nim }}</option>
                        @endforeach
                    </select>
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_kepribadian">Nilai Kepribadian<span style="color:red;">*</span></label>
                    <input type="text" name="nilai_kepribadian"
                        class="form-control @error('nilai_kepribadian') is-invalid @enderror" id="nilai_kepribadian"
                        placeholder="Nilai Kepribadian" required value="{{ old('nilai_kepribadian') }}">
                    @error('nilai_kepribadian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_ipk">Nilai IPK<span style="color:red;">*</span></label>
                    <input type="text" name="nilai_ipk" class="form-control @error('nilai_ipk') is-invalid @enderror"
                        id="nilai_ipk" placeholder="Nilai IPK" required value="{{ old('nilai_ipk') }}">
                    @error('nilai_ipk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_prestasi">Nilai Prestasi<span style="color:red;">*</span></label>
                    <input type="text" name="nilai_prestasi"
                        class="form-control @error('nilai_prestasi') is-invalid @enderror" id="nilai_prestasi"
                        placeholder="Nilai Prestasi" required value="{{ old('nilai_prestasi') }}">
                    @error('nilai_prestasi')
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
