@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data Tahun Usulan</h3>
            <form action="/tahunusulan/{{ $tahunusulan->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">ID Tahun Usulan</h4>
                                <p class="card-text"><?= $tahunusulan['id'] ?></p>
                                <h4 class="card-title">Jenis Beasiswa</h4>
                                <p class="card-text"><?= $tahunusulan['jenis_beasiswa'] ?></p>
                                <h4 class="card-title">Tahun</h4>
                                <p class="card-text"><?= $tahunusulan['tahun'] ?></p>
                                <h4 class="card-title">Kuota</h4>
                                <p class="card-text"><?= $tahunusulan['kuota'] ?></p>
                                <h4 class="card-title">Status</h4>
                                <p class="card-text"><?= $tahunusulan['status'] ?></p>
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
