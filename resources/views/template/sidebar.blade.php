  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/dashboard" class="brand-link">
          <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SPK Beasiswa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  @if (auth()->User()->level == 'Mahasiswa')
                      <li class="nav-item">
                          <a href="/berkasmahasiswa" class="nav-link">
                              <i class="far fa fa-users nav-icon"></i>
                              <p>
                                  Data Berkas Mahasiswa
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/berkasmahasiswa/detail" class="nav-link">
                              <i class="far fa fa-users nav-icon"></i>
                              <p>
                                  Pengajuan Berkas
                              </p>
                          </a>
                      </li>
                @elseif(auth()->User()->level == 'Admin')
                    <li class="nav-item">
                      <a href="/berkasmahasiswa" class="nav-link">
                          <i class="far fa fa-users nav-icon"></i>
                          <p>
                              Data Berkas Mahasiswa
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/berkasmahasiswa/detail" class="nav-link">
                          <i class="far fa fa-users nav-icon"></i>
                          <p>
                              Pengajuan Berkas
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/user" class="nav-link">
                          <i class="nav-icon far fa-user"></i>
                          <p>
                              Data User
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/prodi" class="nav-link">
                          <i class="nav-icon far fa fa-chalkboard-teacher"></i>
                          <p>
                              Data Prodi
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/jenisprestasi" class="nav-link">
                          <i class="nav-icon far fa fa-book"></i>
                          <p>
                              Data Jenis Prestasi
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/tahunusulan" class="nav-link">
                          <i class="nav-icon far fa fa-calendar"></i>
                          <p>
                              Data Tahun Usulan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/bobotkriteria" class="nav-link">
                          <i class="nav-icon far fa fa-clipboard-list"></i>
                          <p>
                              Data Bobot Kriteria
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/mahasiswa" class="nav-link">
                          <i class="far fa fa-users nav-icon"></i>
                          <p>Data Mahasiswa</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/nilaimahasiswa" class="nav-link">
                          <i class="far fa fa-book nav-icon"></i>
                          <p>Data Nilai Mahasiswa</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/rekapanbeasiswa" class="nav-link">
                          <i class="nav-icon far fa fa-graduation-cap"></i>
                          <p>
                              Data Rekapan
                          </p>
                      </a>
                  </li>
              </ul>
              @else

              @endif
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
