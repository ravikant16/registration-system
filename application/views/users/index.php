<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply-form</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>"/>
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>"/>
    
    <script src="<?=base_url('assets/js/jquery-3.5.1.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
    <script src="<?=base_url('assets/js/additional-methods.min.js');?>"></script>
</head>
<body>
<input type="hidden" id="base_url" value="<?=base_url();?>">
<?=$header;?>
<?=$main;?>
<?=$footer;?>
<!-- The Modal -->
<div class="modal" id="loader">
  <div class="modal-dialog" style="width:70px;top:40%;margin:0 auto;">
    <div class="modal-content" style="border-radius:10px;">
      <!-- Modal body -->
      <div class="modal-body">
        <img alt="" src="<?=base_url();?>assets/images/loader.gif" width="40">
      </div>
    </div>
  </div>
</div>
</body>
</html>