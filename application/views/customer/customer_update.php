<div class="row">
    <div class="col-12">
        <input type="hidden" name="customer_id" value="<?= @$GetByIdCustomer->customer_id ?>" required>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Customer Name *</label>
            <div class="col-sm-10">
                <input type="text" name="customer_name" value="<?= @$GetByIdCustomer->customer_name ?>" class="form-control form-control-sm" placeholder="Customer Name *" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address *</label>
            <div class="col-sm-10">
                <input type="text" name="customer_address" value="<?= @$GetByIdCustomer->customer_address ?>" class="form-control form-control-sm" placeholder="Address *" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">PIC *</label>
            <div class="col-sm-10">
                <input type="text" name="customer_pic" value="<?= @$GetByIdCustomer->customer_pic ?>" class="form-control form-control-sm" placeholder="PIC *" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Contact *</label>
            <div class="col-sm-10">
                <input type="text" name="customer_contact" value="<?= @$GetByIdCustomer->customer_contact ?>" class="form-control form-control-sm" placeholder="Contact *" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email *</label>
            <div class="col-sm-10">
                <input type="text" name="customer_email" value="<?= @$GetByIdCustomer->customer_email ?>" class="form-control form-control-sm" placeholder="Email *" required>
            </div>
        </div>
        <div class="form-group row clearfix">
            <label class="col-sm-2 col-form-label">Status *</label>
            <div class="col-sm-10">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="StatusEdit1" name="customer_status" value="1" <?= (@$GetByIdCustomer->customer_status == '1' ? 'checked' : '' ) ?>>
                    <label for="StatusEdit1">
                        Active
                    </label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" id="StatusEdit2" name="customer_status" value="2" <?= (@$GetByIdCustomer->customer_status == '2' ? 'checked' : '' ) ?>>
                    <label for="StatusEdit2">
                        Not Active
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>