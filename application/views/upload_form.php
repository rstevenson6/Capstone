<!DOCTYPE html>
<html>
  <body>
    <?php echo $error; ?>
    <?= form_open_multipart('/do_upload'); ?>

      <input type="file" name="userfile" /><br />
      <br />
      <input type="submit" value="import" />

    </form>
    <br />
    <a href="<?= base_url().'timetable' ?>">back</a>
  </body>
  <?php $this->load->view('templates/footer'); ?>
</html>
