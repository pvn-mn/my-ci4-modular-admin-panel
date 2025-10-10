<h2>Manage Users</h2>

<table border="1" cellpadding="6" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
  </tr>

  <?php foreach ($users as $user): ?>
    <tr>
      <td><?= esc($user['id']); ?></td>
      <td><?= esc($user['name']); ?></td>
      <td><?= esc($user['email']); ?></td>
      <td><?= esc($user['role']); ?></td>
      <td>
        <?php if ($user['role'] !== 'admin'): ?>
          <a href="<?= site_url('promote/' . $user['id']); ?>">Make Admin</a> |
        <?php endif; ?>
        <a href="<?= site_url('delete/' . $user['id']); ?>" 
           onclick="return confirm('are you sure?');">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>


<br>
<button><a href="<?= site_url('/dashboard'); ?>">Go back</a></button>
