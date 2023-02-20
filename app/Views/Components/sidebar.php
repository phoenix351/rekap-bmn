<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?=base_url()?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>


                </div>
            </div>
            <ul class="nav nav-primary">

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item <?= ($page=='Kelola Anggaran'?'active':'') ?>">
                    <a href="<?= base_url()?>/anggaran">
                        <i class="fas fa-wallet"></i>
                        <p>Anggaran</p>
                    </a>
                </li>
                <li class="nav-item <?= ($page=='klaim'?'active':'') ?>">
                    <a href="<?= base_url()?>/klaim">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Klaim</p>
                    </a>
                </li>
                <li class="nav-item <?= ($page=='Surat Pengantar'?'active':'') ?>">
                    <a href="<?= base_url()?>/klaim/surat-pengantar">
                        <i class="fas fa-inbox"></i>
                        <p>Surat Pengantar</p>
                    </a>
                </li>
                <li class="nav-item <?= ($page=='item'?'active':'') ?>">
                    <a href="<?= base_url()?>/item">
                        <i class="fas fa-car-alt"></i>
                        <p>Item</p>
                    </a>
                </li>
                <li class="nav-item <?= ($page=='Rekap'?'active':'') ?>">
                    <a href="<?= base_url()?>/rekap">
                        <i class="fas fa-chart-pie"></i>
                        <p>Rekap</p>
                    </a>
                </li>



            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->