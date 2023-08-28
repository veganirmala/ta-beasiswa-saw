@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Mahasiswa</h3>
            <form action="/mahasiswa/create" method="POST">
                @csrf
                <div class="row">
                    <!-- awal kolom 1 -->
                    <div class="col-md-6">
                        <div class="col">
                            <div class="form-group">
                                <label for="nim">NIM<span style="color:red;">*</span></label>
                                <input type="text" name="nim"
                                    class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    placeholder="NIM" required autofocus value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Nama Mahasiswa" required value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <br>
                                <input type="radio" id="perempuan" value="Perempuan" name="jk">
                                <label>Perempuan</label>
                                <tr><input type="radio" id="laki-laki" value="Laki-laki" name="jk">
                                    <label>Laki-laki</label>
                                </tr>
                            </div>
                            <div class="form-group">
                                <label for="id_prodi">Nama Prodi<span style="color:red;">*</span></label>
                                <select class="form-control @error('id_prodi') is-invalid @enderror" tabindex="-1"
                                    aria-hidden="true" name="id_prodi" id="id_prodi" value="{{ old('id_prodi') }}">
                                    @foreach ($prodi as $prodii)
                                        <option value="{{ $prodii->id }}">{{ $prodii->nama_prodi }}</option>
                                    @endforeach
                                </select>
                                @error('id_prodi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telepon Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="no_telp"
                                    class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                    placeholder="No Telepon Mahasiswa" required value="{{ old('no_telp') }}">
                                @error('no_telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    placeholder="Alamat Mahasiswa" required value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah<span style="color:red;">*</span></label>
                                <input type="text" name="pekerjaan_ayah"
                                    class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                    id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required
                                    value="{{ old('pekerjaan_ayah') }}"onFocus=”startCalc();” onBlur=”stopCalc();”>
                                @error('pekerjaan_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- akhir kolom 1 -->
                    <!-- awal kolom 2 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggungan">Jumlah Tanggungan Orang Tua<span style="color:red;">*</span></label>
                            <input type="text" name="tanggungan"
                                class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan"
                                placeholder="Jumlah Tanggungan Orang Tua" required value="{{ old('tanggungan') }}">
                            @error('tanggungan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="total_penghasilan">Penghasilan Ayah<span style="color:red;">*</span></label>
                                <input type="text" name="total_penghasilan"
                                    class="form-control @error('total_penghasilan') is-invalid @enderror"
                                    id="total_penghasilan" placeholder="Penghasilan Ayah" required
                                    value="{{ old('total_penghasilan') }}">
                                @error('total_penghasilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_bank">Nama BANK<span style="color:red;">*</span></label>
                                <select class="form-control @error('nama_bank') is-invalid @enderror" tabindex="-1"
                                    aria-hidden="true" name="nama_bank" id="nama_bank"
                                    value="{{ old('nama_bank') }}">
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BPD">BPD</option>
                                </select>
                                @error('nama_bank')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_rek">No Rekening BANK<span style="color:red;">*</span></label>
                                <input type="text" name="no_rek"
                                    class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                    placeholder="No Rekening BANK" required value="{{ old('no_rek') }}">
                                @error('no_rek')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester<span style="color:red;">*</span></label>
                                <select class="form-control @error('semester') is-invalid @enderror" tabindex="-1"
                                    aria-hidden="true" name="semester" id="semester"
                                    value="{{ old('semester') }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_tahun_usulan">Tahun Usulan<span style="color:red;">*</span></label>
                                <select class="form-control @error('id_tahun_usulan') is-invalid @enderror"
                                    tabindex="-1" aria-hidden="true" name="id_tahun_usulan" id="id_tahun_usulan"
                                    value="{{ old('id_tahun_usulan') }}">
                                    @foreach ($thusulan as $tahunusulan)
                                        <option value="{{ $tahunusulan->id }}">{{ $tahunusulan->tahun }}</option>
                                    @endforeach
                                </select>
                                @error('id_tahun_usulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- akhir kolom 2 -->
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

{{-- <script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('penghasilan_ayah').value;
        var txtSecondNumberValue = document.getElementById('penghasilan_ibu').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('total_penghasilan').value = result;
        }
    }
</script>

<script type="text/javascript">
    var rupiah = document.getElementById('total_penghasilan');
    total_penghasilan.addEventListener('keyup', function(e) {
        //tambahkan 'Rp.' pada saat form di ketik
        //gunakan fungsi formatRupiah() untuk mengubah angka yang diketik menjadi format angka
        total_penghasilan.value = formatRupiah(this.value, 'Rp.');
    });

    /* fungsi formatRupiah() */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        //tambahkan titik jika yang diinput sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script> --}}

@include('template.footer')
