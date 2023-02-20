<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-icon">

                <label for="pemegang_update">Pemegang</label>
                <select class="form-control w-100" id="pemegang_update" name="pemegang_update">
                    <?php foreach($users as $user):?>
                    <option value=<?= $user['id'] ?>><?=$user['nama']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <!-- <div class="form-group">
            <label for="peruntukan">Peruntukan</label>
                <select class="form-control w-100" id="peruntukan" name="peruntukan">
                <option value="0">Operasional Kantor</option>
               
            </select>
          </div> -->
        <div class="form-group">
            <label for="jabatan_update">Peruntukan/Jabatan</label>
            <input type="text" class="form-control" id="jabatan_update" value="<?= $users[0]['jabatan']?>" disabled>

        </div>
        <div class="form-group">
            <label for="id_update">id</label>
            <input type="text" class="form-control" id="item_id_update" name='item_id_update' value="" readonly>

        </div>
        <div class="form-group">
            <label class="form-label">Jenis Barang</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="1" class="selectgroup-input">
                    <span class="selectgroup-button">Kendaraan Dinas Roda 4 (Kepala)</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="2" class="selectgroup-input">
                    <span class="selectgroup-button">Kendaraan Dinas Roda 4</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="3" class="selectgroup-input">
                    <span class="selectgroup-button">Kendaraan Dinas Roda 2</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="4" class="selectgroup-input">
                    <span class="selectgroup-button">Generator Set</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="jenis_id_update">Jenis Identitas</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_id_update" value="Plat Nomor" class="selectgroup-input">
                    <span class="selectgroup-button">Plat Nomor</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_id_update" value="Nomor Mesin" class="selectgroup-input">
                    <span class="selectgroup-button">Nomor Mesin</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="fa fa-key"></i>
                </span>
                <input type="text" id="identitas_update" class="form-control" style="text-transform: uppercase;"
                    placeholder="Identitas" name="identitas_update">
            </div>
        </div>
    </div>

</div>