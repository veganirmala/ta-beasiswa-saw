@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data IPK</h3>
            <form action="/nilaimahasiswa/{{ $nilaimahasiswa->nim }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">NIM</h4>
                                <p class="card-text"><?= $nilaimahasiswa['nim'] ?></p>
                                <h4 class="card-title">Nilai Kepribadian</h4>
                                <p class="card-text"><?= $nilaimahasiswa['nilai_kepribadian'] ?></p>
                                <h4 class="card-title">Nilai IPK</h4>
                                <p class="card-text"><?= $nilaimahasiswa['nilai_ipk'] ?></p>
                                <h4 class="card-title">Nilai Prestasi</h4>
                                <p class="card-text"><?= $nilaimahasiswa['nilai_prestasi'] ?></p>
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
