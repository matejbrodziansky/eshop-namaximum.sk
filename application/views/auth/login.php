<!-- <h1>< ?php echo lang('login_heading');?></h1> -->
<!-- <p>< ?php echo lang('login_subheading');?></p> -->

<div class="login-content container text-center mt-5">


  <div id="infoMessage"><?php echo $message; ?></div>

  <?php echo form_open("auth/login"); ?>

  
    <div style="background-color: #FFFFFF;" class="container col-7 mb-3 ">
      <div class="row">
        <div class="col">
          <p>
            <?php echo lang('login_identity_label', 'identity'); ?>
            <?php echo form_input($identity); ?>
          </p>
          
        </div>
        <div class="col">
          <p>
            <?php echo lang('login_password_label', 'password'); ?>
            <?php echo form_input($password); ?>
          </p>          
        </div>
        
        <p>
          <?php echo lang('login_remember_label', 'remember'); ?>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
        </p>
      </div>
    </div>

    
  <p><?php echo form_submit('submit', 'PRIHLÁSIŤ'); ?></p>

  <?php echo form_close(); ?>

  <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>

</div>