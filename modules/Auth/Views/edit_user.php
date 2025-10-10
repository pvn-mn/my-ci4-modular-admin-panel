<h2>Edit Account</h2>

<form action="<?= site_url('update/' . session()->get('user_id')) ?>" method="post">
  <?= csrf_field(); ?>

  <label>Email</label><br>
  <input type="email" name="email" value="<?= esc($user['email']); ?>" required><br><br>

  <label>New Password (optional)</label><br>
  <input type="password" name="password"><br><br>

  <button type="submit">Save Changes</button>
</form>

<br>
<button><a href="<?= site_url('/dashboard'); ?>">Go back</a></button>
