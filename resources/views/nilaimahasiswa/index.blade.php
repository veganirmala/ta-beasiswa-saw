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
                    <h1 class="m-0">Data Nilai Mahasiswa</h1>
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
                                <form action="/nilaimahasiswa" method="GET">
                                    <div class="input-group mb-3">
                                        <div class="col-auto">
                                            <input type="search" class="form-control" placeholder="Search"
                                                name="search" id="search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="/nilaimahasiswa/create" class="btn btn-primary" title="Tambah Data"><i
                                class="fas fa-plus"></i>
                            Tambah</a>
                        <p></p>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIM</th>
                                        <th>NILAI KEPRIBADIAN</th>
                                        <th>NILAI IPK</th>
                                        <th>NILAI PRESTASI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($nilaimahasiswa)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Nilai Mahasiswa tidak berhasil ditemukan
                                    </div>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($nilaimahasiswa as $nilaimahasiswaa) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td>{{ $nilaimahasiswaa->nim }}</td>
                                        <td>{{ $nilaimahasiswaa->nilai_kepribadian }}</td>
                                        <td>{{ $nilaimahasiswaa->nilai_ipk }}</td>
                                        <td>{{ $nilaimahasiswaa->nilai_prestasi }}</td>
                                        <td>
                                            <a href="/nilaimahasiswa/{{ $nilaimahasiswaa->nim }}/show"
                                                class="btn btn-success" title="Detail Data"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <a href="/nilaimahasiswa/{{ $nilaimahasiswaa->nim }}/edit"
                                                class="btn btn-danger" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="/nilaimahasiswa/{{ $nilaimahasiswaa->nim }}" method="POST">
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
                                {{ $nilaimahasiswa->links() }}
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
