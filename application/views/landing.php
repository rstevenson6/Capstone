<!DOCTYPE html>
<html>
  <body>
    <h1>Timetable Visualizer</h1>
    <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
    <?= validation_errors(); ?>
    <?= form_open('main/index'); ?>

      <label for="username">Username</label>
      <input type="input" name="username" /><br />

      <label for="password">Password</label>
      <input type="password" name="password"></input><br />

      <input type="submit" name="submit" value="sign in" />

    </form>
  </body>
  <?php $this->load->view('templates/footer'); ?>
</html>
