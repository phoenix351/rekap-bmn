<div class="col-md-6">


    <div class="row form-group">

        <div class="col-md-6">
            <div class="input-icon">

                <label for="pemegang">Pemegang</label>
                <select class="form-control w-100" id="pemegang" name="pemegang">
                    <option value selected disabled>--- Pilih pengguna ---</option>

                    <?php foreach($users as $user):?>
                    <option value=<?= $user['id'] ?>><?=$user['nama']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-icon">

                <label for="item">Item</label>
                <select class="form-control" id="item" name="item">
                </select>
            </div>
        </div>

    </div>


    <div class="row form-group">

        <div class="col-md-6">
            <div class="input-icon">
                <label for="tahun">Tahun Klaim</label>
                <select class="form-control w-100" id="tahun" name="tahun">
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-icon">
                <label for="bulan_anggaran">Bulan Klaim</label>
                <select class="form-control w-100" id="bulan_anggaran" name="bulan_anggaran">
                    <option value selected disabled>--- Pilih pengguna ---</option>
                    <option value='1'>Januari</option>
                    <option value='2'>Februari</option>
                    <option value='3'>Maret</option>
                    <option value='4'>April</option>
                    <option value='5'>Mei</option>
                    <option value='6'>Juni</option>
                    <option value='7'>Juli</option>
                    <option value='8'>Agustus</option>
                    <option value='9'>September</option>
                    <option value='10'>Oktober</option>
                    <option value='11'>November</option>
                    <option value='12'>Desember</option>

                </select>
            </div>
        </div>
    </div>

    <div class="form-group d-flex justify-content-end">
        <button class="btn btn-secondary btn-focus  btn-round ml-auto" id="search-rekap-btn">
            <span class="btn-label">
                <i class="fas fa-search"></i> </span>
            Process
        </button>
    </div>

</div>