@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Berkas Mahasiswa</h3>
            <form action="/berkasmahasiswa/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM<span style="color:red;">*</span></label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                        id="nim" placeholder="NIM Mahasiswa" required autofocus value="{{ old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumen_kepribadian">Dokumen Kepribadian<span style="color:red;">*</span></label>
                    <input name="dokumen_kepribadian" id="dokumen_kepribadian"
                        class="form-control @error('dokumen_kepribadian') is-invalid @enderror" type="file"
                        id="formFile">
                    @error('dokumen_kepribadian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumen_khs">Dokumen KHS<span style="color:red;">*</span></label>
                    <input name="dokumen_khs" id="dokumen_khs"
                        class="form-control @error('dokumen_khs') is-invalid @enderror" type="file" id="formFile">
                    @error('dokumen_khs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumen_penghasilan">Dokumen Penghasilan Orang Tua<span
                            style="color:red;">*</span></label>
                    <input name="dokumen_penghasilan" id="dokumen_penghasilan"
                        class="form-control @error('dokumen_penghasilan') is-invalid @enderror" type="file"
                        id="formFile">
                    @error('dokumen_penghasilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumen_nilai_prestasi">Dokumen Nilai Prestasi<span style="color:red;">*</span></label>
                    <input name="dokumen_nilai_prestasi" id="dokumen_nilai_prestasi"
                        class="form-control @error('dokumen_nilai_prestasi') is-invalid @enderror" type="file"
                        id="formFileMultiple">
                    @error('dokumen_nilai_prestasi')
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
