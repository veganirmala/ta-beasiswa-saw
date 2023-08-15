@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Prodi</h3>
            <form action="/prodi/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan<span style="color:red;">*</span></label>
                    <input type="text" name="nama_jurusan"
                        class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan"
                        placeholder="Nama Jurusan" required autofocus value="{{ old('nama_jurusan') }}">
                    @error('nama_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi<span style="color:red;">*</span></label>
                    <input type="text" name="nama_prodi"
                        class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi"
                        placeholder="Nama Prodi" required autofocus value="{{ old('nama_prodi') }}">
                    @error('nama_prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namajurusan">Jenjang<span style="color:red;">*</span></label>
                    <select class="form-control @error('jenjang') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="jenjang" id="jenjang" value="{{ old('jenjang') }}">
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                    </select>
                    @error('jenjang')
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
