<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="id_anggaran_update">ID Anggaran</label>
            <input type="text" class="form-control" name="id_anggaran_update" id="id_anggaran_update" readonly>
        </div>
        <div class="form-group">
            <div class="input-icon">

                <label for="item_update">Item</label>
                <select class="form-control w-100" id="item_update" name="item_update">

                    <?php foreach($items as $item):?>
                    <option value=<?= $item['id'] ?>><?=$item['identitas']?></option>
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
            <label class="form-label">Jenis Barang</label>
            <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="Kendaraan Dinas Roda 4" class="selectgroup-input"
                        disabled>
                    <span class="selectgroup-button">Kendaraan Dinas Roda 4</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="Kendaraan Dinas Roda 2" class="selectgroup-input"
                        disabled>
                    <span class="selectgroup-button">Kendaraan Dinas Roda 2</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="jenis_update" value="Generator Set" class="selectgroup-input" disabled>
                    <span class="selectgroup-button">Generator Set</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="tahun_update">Tahun Anggaran</label>
            <input type="number" class="form-control" length="4" id="tahun_update" name='tahun_update' value=""
                max="<?=date("Y")+2?>" min="<?=date("Y")-10?>">
        </div>

        <div class="form-group">
            <label for="pagu_anggaran_update">Pagu Anggaran</label>

            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control text-right" name="pagu_anggaran_update" id="pagu_anggaran_update"
                    aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>

    </div>

</div>