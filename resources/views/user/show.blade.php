@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data User</h3>
            <form action="/user/{{ $user->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">ID User</h4>
                                <p class="card-text">{{ $user->id }}</p>
                                <h4 class="card-title">Nama User</h4>
                                <p class="card-text">{{ $user->name }}</p>
                                <h4 class="card-title">E-mail User</h4>
                                <p class="card-text">{{ $user->email }}</p>
                                <h4 class="card-title">Jenis Kelamin</h4>
                                <p class="card-text">{{ $user->jk }}</p>
                                <h4 class="card-title">Telepon</h4>
                                <p class="card-text">{{ $user->no_telp }}</p>
                                <h4 class="card-title">Alamat</h4>
                                <p class="card-text">{{ $user->alamat }}</p>
                                <h4 class="card-title">Level</h4>
                                <p class="card-text">{{ $user->level }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                Kembali
            </button>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
