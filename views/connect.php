<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$page = file_get_contents('https://documents.htgsoft.com/login');
?>

<div id="wrapper">
   <div class="content">
      <div class="row">
         <div class="col-md-12 animated fadeIn">
            <div class="panel_s">
               <div class="panel-heading">
                  <h4 class="panel-title tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">
                     BookStack Integration
                  </h4>
               </div>
               <div class="panel-body">
                  Đang kết nối với bookstack ...
                  
                  <div class="spinner-border text-muted"></div>
                  <div style="display: none;">
                     <?= $page; ?>
                  </div>
                  <script>
                     function submitForm() {
                        document.getElementById("email").value = "<?= $username ?>";
                        document.getElementById("password").value = "<?= $password ?>";
                        document.forms["login-form"].submit();
                     };

                     if (document.getElementById("login-form")) {
                       setTimeout(submitForm(), 5000); // set timeout 
                     };
                  </script>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php init_tail(); ?>
</body>

</html>