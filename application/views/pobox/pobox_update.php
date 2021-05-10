<div class="row">
    <div class="col-12">
        <input type="hidden" name="pobox_id" value="<?= @$GetByIdPoBox->pobox_id ?>" required>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Office *</label>
            <div class="col-sm-10">
                <select class="form-control form-control-sm select-office" name="pobox_office" style="width: 100%;">
                    <option value="">Office *</option>
                    <option value="<?= @$GetByIdPoBox->pobox_office ?>" selected="selected"><?= $this->PoBoxModel->get_byid_office(@$GetByIdPoBox->pobox_office)->office_name; ?></option>
                    <?php foreach ($GetAllOffice as $key => $value) { 
                        if($value->office_id != @$GetByIdPoBox->pobox_office) {
                    ?>
                    <option value="<?= $value->office_id ?>"><?= $value->office_name ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-sm-2 col-form-label">Status *</label>
            <div class="col-sm-10">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="StatusEdit1" name="pobox_status" value="1" <?= (@$GetByIdPoBox->pobox_status == '1' ? 'checked' : '' ) ?>>
                    <label for="StatusEdit1">
                        Active
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="StatusEdit2" name="pobox_status" value="2" <?= (@$GetByIdPoBox->pobox_status == '2' ? 'checked' : '' ) ?>>
                    <label for="StatusEdit2">
                        Not Active
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>