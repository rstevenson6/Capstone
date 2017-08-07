<!DOCTYPE html>
<html>
  <body>
    <?= validation_errors(); ?>
    <?php echo $error; ?>
    <?= form_open_multipart('/do_upload'); ?>

      <input type="file" name="userfile" /><br />
      <br />
      <input type="submit" value="import" />

    </form>
  </body>
  <?php $this->load->view('templates/footer'); ?>
</html>
