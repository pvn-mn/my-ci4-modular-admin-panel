<?= $this->extend('Modules\Auth\Views\layouts\main') ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
<form action="<?= site_url('register/auth') ?>"  method="post" class="border rounded p-4" style="max-width: 400px; width: 100%;">
  <?= csrf_field() ?>

  <div class="container">
    <h3 class="text-center mb-4">Register</h3>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <div class="mb-3">
      <label for="name"><b>Name</b></label><br>
      <input type="text" placeholder="Enter Name" name="name" id="name" required>
    </div>
    
  <div class="mb-3" >
    <label for="email"><b>Email</b></label><br>
     <input type="email" placeholder="Enter Email" name="email" id="email" required>
  </div>

  <div class="mb-3" >
    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>    
  </div>
    <hr>

    <p class="text-center"> <button type="submit" class="registerbtn btn btn-primary">Register</button> </p>
  </div>

    <p class="text-center mb-0">Already have an account? <a href="<?= site_url('login') ?>">Sign in</a>.</p>
  
</form>
</div>

<?= $this->endSection() ?>
