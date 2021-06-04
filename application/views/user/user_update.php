<div class="row">
    <div class="col-12">
        <input type="hidden" name="user_id" value="<?= @$GetByIdUser->user_id ?>" required>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name *</label>
            <div class="col-sm-10">
                <input type="text" name="user_name" value="<?= @$GetByIdUser->user_name ?>" class="form-control form-control-sm" placeholder="Name" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email *</label>
            <div class="col-sm-10">
                <input type="text" name="user_email" value="<?= @$GetByIdUser->user_email ?>" class="form-control form-control-sm" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Type *</label>
            <div class="col-sm-10">
                <select class="form-control form-control-sm select-typeuser" name="user_type" style="width: 100%;">
                    <option value="">Type *</option>
                    <option value="1" <?= (@$GetByIdUser->user_type == '1' ? 'selected="selected"' : '' ) ?>>Super Administrator</option>
                    <option value="2" <?= (@$GetByIdUser->user_type == '2' ? 'selected="selected"' : '' ) ?>>Administrator</option>
                    <option value="3" <?= (@$GetByIdUser->user_type == '3' ? 'selected="selected"' : '' ) ?>>User</option>
                </select>
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-sm-2 col-form-label">Status *</label>
            <div class="col-sm-10">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="StatusEdit1" name="user_status" value="1" <?= (@$GetByIdUser->user_status == '1' ? 'checked' : '' ) ?>>
                    <label for="StatusEdit1">
                        Active
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="StatusEdit2" name="user_status" value="2" <?= (@$GetByIdUser->user_status == '2' ? 'checked' : '' ) ?>>
                    <label for="StatusEdit2">
                        Not Active
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>