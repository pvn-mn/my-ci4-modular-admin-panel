<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Dashboard') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- jquery linking -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      body { background-color: #f8f9fa; }
      .sidebar {
        background-color: #f1f1f1;
        min-height: 100vh;
        padding-top: 1rem;
      }
      .sidebar a.active { background-color: #0d6efd; color: #fff !important; }
      .content-area { padding: 1.5rem; }
    </style>
  </head>

  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">MySystem</a>
        <div class="d-flex">
          <a href="<?= site_url('logout') ?>" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        </div>
      </div>
    </nav>

    
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-3 col-lg-2 sidebar">
          <ul class="nav flex-column gap-1">
            <li><a href="#" class="nav-link active" data-url="<?= site_url('dashboard') ?>">Dashboard</a></li>

          <?php if (session()->get('role') == 'admin'): ?>
              <li><a href="#" class="nav-link" data-url="<?= site_url('login-history') ?>">User History</a></li>
              <li><a href="#" class="nav-link" data-url="<?= site_url('manage-user') ?>">Manage User</a></li>
          <?php endif; ?>

            <li><a href="#" class="nav-link" data-url="<?= site_url('edit/' . session()->get('user_id')) ?>">Edit User</a></li>
          </ul>
        </nav>


        <main class="col-md-9 ms-sm-auto col-lg-10 content-area" id="ajax-content">
          <?= $this->renderSection('content') ?>
        </main>

      </div>
    </div>


    <?= $this->include('Modules\User\Views\layouts\dashboard_script') ?>


  </body>
</html>