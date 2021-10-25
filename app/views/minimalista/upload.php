<?php
$this->view("minimalista/header", $data);
?>

<main role="main">
  <section class="section background-white">
    <div class="s-12 m-12 l-4 center">
      <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Upload Image</h4>
      <form name="contactForm" class="customform" method="post" enctype="multipart/form-data">
        <div class="s-12">
          <input name="title" class="subject" placeholder="Title" title="title" type="text" required>
          <p class="subject-error form-error">Please enter the title.</p>
        </div>
        <div class="s-12">
          <input name="file" class="subject" type="file" required>
          <p class="subject-error form-error">Please select a file.</p>
        </div>
        <div class="s-12">
          <textarea name="description" class="subject" placeholder="Your description here" title="description" rows="3" required></textarea>
          <p class="subject-error form-error">Please enter the description.</p>
          <div class="s-12 margin-bottom-20 ">
            <p style="color: red"><?php checkMessage() ?></p>
          </div>
        </div>
        <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Submit Button</button></div>
      </form>
    </div>
  </section>
</main>



<?php
$this->view("minimalista/footer", $data);
?>