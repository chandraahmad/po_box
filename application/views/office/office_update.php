<div class="row">
    <div class="col-12">
        <input type="hidden" name="office_id" value="<?= @$GetByIdOffice->office_id ?>" required>
        <div class="form-group row clearfix">
            <label class="col-sm-2 col-form-label">Have Regional ? *</label>
            <div class="col-sm-10">
                <div class="icheck-primary d-inline">
                    <input type="radio" class="regval" id="Regional1Update" name="office_regional_val" value="2" onchange="getRegionalUpdate(this)" <?= (@$GetByIdOffice->office_regional != '1' ? 'checked' : '' ) ?> required>
                    <label for="Regional1Update">
                        Yes
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" class="regval" id="Regional2Update" name="office_regional_val" value="1" onchange="getRegionalUpdate(this)" <?= (@$GetByIdOffice->office_regional == '1' ? 'checked' : '' ) ?> required>
                    <label for="Regional2Update">
                        No
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row showregional-update">
            <?php if($GetByIdOffice->office_regional != '1') { ?>
            <label class="col-sm-2 col-form-label">Regional *</label>
            <div class="col-sm-10">
                <select class="form-control form-control-sm select-regional" name="office_regional" style="width: 100%;">
                    <option value="<?= $GetByIdOffice->office_regional ?>" selected="selected"><?= $this->OfficeModel->get_byid_office($GetByIdOffice->office_regional)->office_name ?></option>
                    <?php foreach ($GetAllRegional as $key => $value) { ?>
                    <option value="<?= $value->office_id ?>"><?= $value->office_name ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Office Name *</label>
            <div class="col-sm-10">
                <input type="text" name="office_name" value="<?= @$GetByIdOffice->office_name ?>" class="form-control form-control-sm" placeholder="Office Name *" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address *</label>
            <div class="col-sm-10">
                <input type="text" name="office_address" value="<?= @$GetByIdOffice->office_address ?>" class="form-control form-control-sm" placeholder="Address *" required>
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-sm-2 col-form-label">Status *</label>
            <div class="col-sm-10">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="Status1Update" name="office_status" value="1" <?= (@$GetByIdOffice->office_status == '1' ? 'checked' : '' ) ?>>
                    <label for="Status1Update">
                        Active
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="Status2Update" name="office_status" value="2" <?= (@$GetByIdOffice->office_status == '2' ? 'checked' : '' ) ?>>
                    <label for="Status2Update">
                        Not Active
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>