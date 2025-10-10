<h2>Login History</h2>
<table border="1">
    <tr>
        <th>User</th>
        <th>Login Time</th>
    </tr>
    <?php foreach ($history as $row): ?>
    <tr>
        <td><?= esc($row['email']) ?> (<?= esc($row['name']) ?>)</td>
        <td><?= esc($row['logged_in_at']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>
<button><a href="<?= site_url('/dashboard'); ?>">Go back</a></button>
