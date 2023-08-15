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
                    <h1 class="m-0">Data Bobot Kriteria</h1>
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
                        <a href="/bobotkriteria/create" class="btn btn-primary" title="Tambah Data"><i
                                class="fas fa-plus"></i> Tambah</a>
                        <p></p>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TAHUN USULAN</th>
                                        <th>BOBOT KEPRIBADIAN</th>
                                        <th>BOBOT IPK</th>
                                        <th>BOBOT PRESTASI</th>
                                        <th>BOBOT PENGHASILAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($bobotkriteria)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Bobot Kriteria tidak berhasil ditemukan
                                    </div>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($bobotkriteria as $bobotkriteriaa) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td>{{ $bobotkriteriaa->tahun }}</td>
                                        <td>{{ $bobotkriteriaa->bobot_kepribadian }}</td>
                                        <td>{{ $bobotkriteriaa->bobot_ipk }}</td>
                                        <td>{{ $bobotkriteriaa->bobot_prestasi }}</td>
                                        <td>{{ $bobotkriteriaa->bobot_penghasilan }}</td>
                                        <td>
                                            <a href="/bobotkriteria/{{ $bobotkriteriaa->id }}/show"
                                                class="btn btn-success" title="Detail Data"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <a href="/bobotkriteria/{{ $bobotkriteriaa->id }}/edit"
                                                class="btn btn-danger" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="/bobotkriteria/{{ $bobotkriteriaa->id }}" method="POST">
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
