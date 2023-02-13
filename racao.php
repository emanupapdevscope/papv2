<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=iso-8859-1"><meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4Cows >Ração</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
<?php include "DBConnection.php";?>
<?php include'sessaosegurauser.php';?>
<body>
<?php 
		 if (($_SESSION['tipo']==1)){
		 include 'menuadmin.php';}
		 else{
		  include 'menuuser.php';}?>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
	  <?php 
	  $divide  = explode("?", $_SERVER["REQUEST_URI"]);
	  $divide['1'];
	  $idracao=$divide['1'];
	  $qry="Select * from racao where idracao='$idracao'";
	  $result=mysqli_query($link,$qry);
	  ?>
	  <?php while ($row=mysqli_fetch_array($result)){?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $row['nome'];?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="admin.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Rações</a></div>
              <div class="breadcrumb-item"><?php echo $row['nome'];?></div>

            </div>
          </div>

<div class="card card-primary">
              <div class="card-header"><h4>Informação Geral</h4>
			  
			  <?php  if (($_SESSION['tipo']==1)){
				  $url1 = 'racao_edit.php?'.$row['idracao']; ?>
			  <button onclick="window.location.href='<?php echo $url1; ?>';" class="btn btn-primary" type="submit">Editar</button>
			  <?php }else{}?>
			  </div>
              <div class="card-body">
				<?php $url='racao_addstock.php?'.$row['idracao'];?>
                <form enctype="multipart/form-data" action="<?php echo $url;?>" method="POST">
                  
                    <div class="form-group col-0">
                      <label for="num">Nome</label>
                      <input id="nome" type="text" class="form-control" name="nome" value="<?php echo $row['nome'];?>" readonly>
                    </div>
					
					<div class="row">
                    <div class="form-group col-6">
					<div class="form-group">
                      <label>Dose(Grama Por Litro de Leite)</label>
                      <input type="text" class="form-control" name="validade" value="<?php echo $row['dose'];?>" readonly>
                    </div>
                    </div>
					<div class="form-group col-6">
					<div class="form-group">
                      <label>Preço</label>
                      <input type="text" class="form-control" name="preco" value="<?php echo $row['preco'];?>€" readonly>
                    </div>
                    </div>
                  </div>
				<div class="row">
                 <div class="form-group col-6">
                      <label>Tipo</label>
					   <?php if ($row['tipo']==1){$tipo='Leiteiras';} elseif($row['tipo']==0){$tipo='Secas';}else{$tipo='Todas';} ?>
                      <input id="intseg" type="text" class="form-control" name="intseg" value="<?php echo $tipo;?>" readonly>
                    </div>
				  <div class="form-group col-6">
                      <label for="num">Quantidade em Stock(Kg)</label>
					  <?php $qdisp=$row['qd']/1000;?>
                      <input id="qt" type="text" class="form-control" name="qt" value="<?php echo $qdisp;?>" readonly>
                    </div>
                  
				</div>

				  
                  <div class="form-group mb-0">
                    <label>Observações</label>
                    <textarea class="form-control" required="" style="height: 182px;" name="observ"  readonly><?php echo $row['observ'];?></textarea>
                  </div>
				  <br>
				  <?php 
					 if (($_SESSION['tipo']==1)){?>
				  <label><h5>Adicionar Stock(ml)</h5></label>
                  <div class="input-group mb-3">					
                        <input type="text" class="form-control" name="stock" aria-label="">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">Adicionar</button>
                        </div>
                      </div>
					<?php } else{} ?>
                </form>
				<?php }?>
              </div>
            </div>
          <div class="section-body">
            <div class="row">
              
        </section>
      </div>
      <?php include 'footer.php';?>
    </div>
  </div>
  


  <!-- General JS Scripts -->
  
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  
  <!-- JS Libraies -->
  <script src="assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/forms-advanced-forms.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>