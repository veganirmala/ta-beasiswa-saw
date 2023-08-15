@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data User</h3>
            <form action="/user/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Nama Lengkap" required autofocus value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="email">E-mail<span style="color:red;">*</span></label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="***@gmail.com" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="password">Password<span style="color:red;">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" required value="{{ old('password') }}">
                    @error('password')
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
                    <label for="no_telp">Telepon<span style="color:red;">*</span></label>
                    <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                        id="no_telp" placeholder="Telepon" required value="{{ old('no_telp') }}">
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat<span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">Level<span style="color:red;">*</span></label>
                    <select class="form-control @error('level') is-invalid @enderror" tabindex="-1" aria-hidden="true"
                        name="level" id="level" value="{{ old('level') }}">
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
