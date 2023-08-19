@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Prodi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (session()->has('success'))
        <div class="alert alert-success col-12" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <form action="/prodi" method="GET">
                                    <div class="input-group mb-3">
                                        <div class="col-auto">
                                            <input type="search" class="form-control" placeholder="Search"
                                                name="search" id="search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="/prodi/create" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"></i>
                            Tambah</a>
                        <p></p>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA JURUSAN</th>
                                        <th>NAMA PRODI</th>
                                        <th>JENJANG</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($prodi)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Prodi tidak berhasil ditemukan
                                    </div>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($prodi as $prodii) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td>{{ $prodii->nama_jurusan }}</td>
                                        <td>{{ $prodii->nama_prodi }}</td>
                                        <td>{{ $prodii->jenjang }}</td>
                                        <td>
                                            <a href="/prodi/{{ $prodii->id }}/show" class="btn btn-success"
                                                title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                            <a href="/prodi/{{ $prodii->id }}/edit" class="btn btn-danger"
                                                title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="/prodi/{{ $prodii->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning" title="Delete Data"
                                                    onclick="return confirm('Apakah anda akan menghapus data ini?');"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $prodi->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('template.footer')
