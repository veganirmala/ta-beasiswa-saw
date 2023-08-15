@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Data Berkas Mahasiswa</h3>
            <form action="/berkasmahasiswa/{{ $berkasmahasiswa->nim }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nim">NIM<span style="color:red;">*</span></label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                        id="nim" placeholder="NIM" required value="{{ old('nim', $berkasmahasiswa->nim) }}"
                        disabled>
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status Pengajuan<span style="color:red;">*</span></label>
                    <select class="form-control @error('status') is-invalid @enderror" tabindex="-1" aria-hidden="true"
                        name="status" id="status" value="{{ old('status', $berkasmahasiswa->status) }}">
                        <option value="Dalam Proses Pemeriksaan">Dalam Proses Pemeriksaan</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <h4 class="card-title">Keterangan<span style="color:red;">*</span></h4>
                    <textarea name="keterangan" id="keterangan" cols="40" rows="10"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        value="{{ old('keterangan', $berkasmahasiswa->keterangan) }}"></textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Verifikasi
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
