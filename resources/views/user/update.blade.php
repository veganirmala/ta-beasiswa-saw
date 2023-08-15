@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Data User</h3>
            <form action="/update-profile" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Nama Lengkap" required value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <br>
                    <input type="radio" id="perempuan" value="Perempuan" name="jk" <?php if ($user['jk'] == 'Perempuan') {
                        echo 'checked';
                    } ?>>
                    <label for="perempuan">Perempuan</label>
                    <tr><input type="radio" id="laki-laki" value="Laki-laki" name="jk" <?php if ($user['jk'] == 'Laki-laki') {
                        echo 'checked';
                    } ?>>
                        <label for="laki-laki">Laki-laki</label>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="no_telp">Telepon<span style="color:red;">*</span></label>
                    <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                        id="no_telp" placeholder="Telepon" required value="{{ old('no_telp', $user->no_telp) }}">
                    @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat<span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat" placeholder="Alamat" required value="{{ old('alamat', $user->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">Level<span style="color:red;">*</span></label>
                    <select class="form-control @error('level') is-invalid @enderror" tabindex="-1" aria-hidden="true"
                        name="level" id="level" value="{{ old('level', $user->level) }}">
                        <option value="<?= $user['level'] ?>"><?= $user['level'] ?></option>
                        <option value="Admin">Admin</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                    </select>
                    @error('level')
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
