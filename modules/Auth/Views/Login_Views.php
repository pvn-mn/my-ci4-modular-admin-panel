<?= $this->extend('Modules\Auth\Views\layouts\main') ?>

<?= $this->section('content') ?>


<div class="container d-flex justify-content-center align-items-center min-vh-100">
<form action="<?= site_url('login/auth') ?>" method="post" class="border rounded p-4" style="max-width: 400px; width: 100%;">
 <?= csrf_field() ?>

 

  <div class="container">
  <h3 class="text-center mb-4">Login</h3>

  <div class="mb-3">
    <label for="email"><b>Email</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required>
  </div>
  <hr>

     <p class="text-center"><button type="submit" class="registerbtn btn btn-primary">Login</button></p>

  </div>


    <p class="text-center mb-0"> Dont have an account?<a href="<?= site_url('register') ?>">Register</a></p>
  
</form>


<?= $this->endSection() ?>