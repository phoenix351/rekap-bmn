<div class="col-md-6">
    <form action="<?=base_url()?>/klaim/cetak-surat-pengantar" method="GET">

        <div class="form-group">
            <label for="tanggal_surat">Tanggal surat</label>
            <input type="date" class="form-control" id="tanggal_surat" name='tanggal_surat' required>
        </div>

        <h4 class="mt-2">Detail Pengguna</h4>
        <div class="row form-group">
            <div class="col-md-6">
                <label for="nama_pemegang">Nama Pemegang</label>
                <input type="text" class="form-control" id="nama_pemegang" name='nama_pemegang' readonly>
            </div>
            <div class="col-md-6">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name='jabatan' readonly>
            </div>
        </div>

        <h4 class="mt-2">Detail Item</h4>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="jenis">Jenis Item</label>
                <input type="text" class="form-control" id="jenis" name='jenis' readonly>
            </div>
            <div class="col-md-3">
                <label for="identitas">Identitas Item</label>
                <input type="text" class="form-control" id="identitas" name='identitas' readonly>
            </div>
            <div class="col-md-3">
                <label for="tahun_cetak">Tahun</label>
                <input type="text" class="form-control" id="tahun_cetak" name='tahun_cetak' readonly>
            </div>
            <div class="col-md-3">
                <label for="bulan_cetak">Bulan</label>
                <input type="text" class="form-control" id="bulan_cetak" name='bulan_cetak' readonly>
            </div>
        </div>

        <h4 class="mt-2">Detail Klaim</h4>

        <div class="row form-group">
            <div class="col-md-4">
                <label for="klaim_bbm">Jumlah Klaim BBM</label>
                <input type="text" class="form-control" id="klaim_bbm" name='klaim_bbm' readonly>
            </div>
            <div class="col-md-4">
                <label for="klaim_sparepart">Jumlah Klaim Sparepart</label>
                <input type="text" class="form-control" id="klaim_sparepart" name='klaim_sparepart' readonly>
            </div>
            <div class="col-md-4">
                <label for="klaim_jasa">Jumlah Klaim Jasa</label>
                <input type="text" class="form-control" id="klaim_jasa" name='klaim_jasa' readonly>
            </div>
        </div>


        <div class="form-group">
            <label for="klaim_total">Jumlah Klaim Total</label>
            <input type="text" class="form-control" id="klaim_total" name='klaim_total' readonly>
        </div>
        <div class="form-group d-flex justify-content-end">
            <button class="btn btn-secondary btn-focus  btn-round ml-auto" id="search-rekap-btn">
                <span class="btn-label">
                    <i class="fas fa-print"></i> </span>
                Print Surat Pengantar
            </button>
        </div>
    </form>
</div>