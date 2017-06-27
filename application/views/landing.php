<!DOCTYPE html>
<html>
  <?php $this->load->view('templates/header'); ?>
  <body>
    <h1>Timetable Visualizer</h1>
    <?= form_open('welcome/index'); ?>

      <label for="username">Username</label>
      <input type="input" name="username" /><br />

      <label for="password">Password</label>
      <input name="password"></input><br />

      <input type="submit" name="submit" value="sign in" />

    </form>
  </body>
  <?php $this->load->view('templates/footer'); ?>
</html>
