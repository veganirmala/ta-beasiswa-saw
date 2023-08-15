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
                    <h1 class="m-0">Data Rekapan Beasiswa</h1>
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
                    <div class="card-header py-3">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                        <!-- tampilin tahun usulan aktif -->
                        <div class="form-group">
                            <form action="" class="form-inline my-2 my-lg-0" method="post">
                                <select name="th" class="custom-select mr-1" id="inputGroupSelect04"
                                    aria-label="Example select with button addon">
                                    <option value="" selected>Pilih Tahun Usulan</option>
                                    @foreach ($thusulan as $tahunusulan)
                                        <option value="{{ $tahunusulan->tahun }}">{{ $tahunusulan->tahun }}</option>
                                    @endforeach
                                </select>
                                {{-- <div class="input-group">
                                    <button class="btn btn-secondary" type="submit">Cari</button>
                                </div> --}}
                            </form>
                        </div>
                        <div class="d-flex">
                            <form action="/rekapanbeasiswa/sinkron" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" title="Sinkronisasi Data"><i
                                        class="fas fa-spinner"></i> Sinkronisasi</button>
                            </form>
                            <a class="btn btn-info ml-2" href="{{ route('rekap.export') }}"><i
                                    class="fas fa-file-download"></i>Cetak Data</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card shadow mb-4">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Tahun Usulan</th>
                                            <th>Skor IPK</th>
                                            {{-- <th>Skor Pribadi</th> --}}
                                            <th>Skor Prestasi</th>
                                            <th>Skor Ekonomi</th>
                                            <th>Skor Total</th>
                                            <th>Status Kelayakan</th>
                                            {{-- <th>Action</th> --}}
                                            {{-- <th>Ranking</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($rekapan)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            Data Rekapan Beasiswa tidak berhasil ditemukan
                                        </div>
                                        <?php endif; ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($rekapan as $rekapans) : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td>{{ $rekapans->nim }}</td>
                                            <td>{{ $rekapans->tahun }}</td>
                                            <td>{{ $rekapans->skor_ipk }}</td>
                                            <td>{{ $rekapans->skor_prestasi }}</td>
                                            <td>{{ $rekapans->skor_ekonomi }}</td>
                                            <td>{{ $rekapans->total }}</td>
                                            <td>{{ $rekapans->status }}</td>
                                            {{-- <td>
                                                <a href="/rekapanbeasiswa/{{ $rekapans->id }}/show"
                                                    class="btn btn-success" title="Detail Data"><i
                                                        class="fas fa-info-circle"></i></a>
                                                <a href="/rekapanbeasiswa/{{ $rekapans->id }}/edit"
                                                    class="btn btn-danger" title="Edit Data"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="/rekapanbeasiswa/{{ $rekapans->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-warning" title="Delete Data"
                                                        onclick="return confirm('Apakah anda akan menghapus data ini?');"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td> --}}
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

<script>
    $(document).ready(function() {
        $('#inputGroupSelect04').on('change', function() {
            var selectedValue = $(this).val();
            filterTable(selectedValue);
        });

        function filterTable(selectedValue) {
            // Perform filtering based on the selected value
            $('#example2 tbody tr').each(function() {
                var rowValue = $(this).find('td:nth-child(3)')
                    .text(); // Assuming the year is in the third column (index 2)

                if (rowValue === selectedValue || selectedValue === '') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

@include('template.footer')
