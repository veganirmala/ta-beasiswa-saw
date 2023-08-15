@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Jenis Prestasi</h3>
            <form action="/jenisprestasi/{{ $jenisprestasi->id }}" method="POST">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="jenis_prestasi">Jenis Prestasi<span style="color:red;">*</span></label>
                    <select class="form-control @error('jenis_prestasi') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="jenis_prestasi" id="jenis_prestasi"
                        value="{{ old('jenis_prestasi') }}">
                        <option value="{{ $jenisprestasi->jenis_prestasi }}">{{ $jenisprestasi->jenis_prestasi }}
                        </option>
                        <option value="Akademik">Akademik</option>
                        <option value="Non Akademik">Non Akademik</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('jenis_prestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="peringkat">Peringkat<span style="color:red;">*</span></label>
                    <select class="form-control @error('peringkat') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="peringkat" id="peringkat" value="{{ old('peringkat') }}">
                        <option value="{{ $jenisprestasi->peringkat }}">{{ $jenisprestasi->peringkat }}</option>
                        <option value="Juara 1">Juara 1</option>
                        <option value="Juara 2">Juara 2</option>
                        <option value="Juara 3">Juara 3</option>
                        <option value="Harapan 1">Harapan 1</option>
                        <option value="Harapan 2">Harapan 2</option>
                        <option value="Harapan 3">Harapan 3</option>
                    </select>
                    @error('peringkat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tingkat">Tingkat<span style="color:red;">*</span></label>
                    <select class="form-control @error('tingkat') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="tingkat" id="tingkat" value="{{ old('tingkat') }}">
                        <option value="<?= $jenisprestasi['tingkat'] ?>"><?= $jenisprestasi['tingkat'] ?></option>
                        <option value="Intern Kampus">Intern Kampus</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Nasional">Nasional</option>
                    </select>
                    @error('tingkat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai<span style="color:red;">*</span></label>
                    <input type="text" name="nilai" class="form-control @error('nilai') is-invalid @enderror"
                        id="nilai" placeholder="Nilai" required value="{{ old('nilai', $jenisprestasi->nilai) }}">
                    @error('nilai')
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
