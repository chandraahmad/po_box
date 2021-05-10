<?php if($id == '1') { ?>
    <input type="hidden" name="office_regional" value="1">
<?php }else{ ?>
<label class="col-sm-2 col-form-label">Regional *</label>
<div class="col-sm-10">
    <select class="form-control form-control-sm select-regional" name="office_regional" style="width: 100%;">
        <option value="" selected="selected">Regional *</option>
        <?php foreach ($GetAllRegional as $key => $value) { ?>
        <option value="<?= $value->office_id ?>"><?= $value->office_name ?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>
<script>
    $('.select-regional').select2();
</script>