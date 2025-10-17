<!-- < ?= $this->extend('Modules\User\Views\layouts\dashboard_layout') ?>

< ?= $this->section('content') ?> -->

  <body class="bg-light text-center p-4">
    <div class="container">
        <h2>Login History</h2>
        <div class="d-flex justify-content-center mb-4">
        <table class="table table-striped-columns table-bordered table-sm w-50">
        <thead class="table-success">
            <tr>
                <th scope="col">User</th>
                <th scope="col">Login Time</th>
            </tr>
        </thead>
        
        <tbody>        
            <?php foreach ($history as $row): ?>
            <tr>
                <td><?= esc($row['email']) ?> (<?= esc($row['name']) ?>)</td>
                <td><?= esc($row['logged_in_at']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

        </table>
        </div>
        
        <br>
        <a href="<?= site_url('/dashboard'); ?>" ><button type="button" class="btn btn-primary">Go back</button></a>
  </div>
  
  </body>

  <!-- < ?= $this->endSection() ?> -->