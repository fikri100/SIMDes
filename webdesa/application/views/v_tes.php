<?php echo form_open_multipart(base_url("surat/tes"),array('class' => 'form-horizontal')); ?>
  <input type="file" name="file" value="">
  <input type="submit" name="save" value="Save">
  <?php echo $this->session->flashdata('upload_error'); ?>
<?= form_close(); ?>
