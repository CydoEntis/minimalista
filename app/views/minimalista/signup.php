<?php
$this->view("minimalista/header", $data);
?>

<main role="main">
  <section class="section background-white">
    <div class="s-12 m-12 l-4 center">
      <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Sign Up</h4>
      <form name="contactForm" class="customform" method="post">
        <div class="s-12">
          <input name="username" class="subject" placeholder="Username" title="username" type="text" required>
          <p class="subject-error form-error">Please enter a username.</p>
        </div>
        <div class="s-12">
          <input name="email" class="subject" placeholder="Email" title="email" type="email" required>
          <p class="subject-error form-error">Please enter an email.</p>
        </div>
        <div class="s-12">
          <input name="password" class="subject" type="password" placeholder="password" required>
          <p class="subject-error form-error">Invalid password, please try again.</p>
        </div>
        <div class="s-12">
          <a href="login" class="margin-bottom-20">Already have an account? Login here!</a>
        </div>
        <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Sign Up</button></div>
      </form>
    </div>
  </section>
</main>

<?php
$this->view("minimalista/footer", $data);
?>