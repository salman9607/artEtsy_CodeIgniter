<?php
$this->load->view("common/header.php");
$this->load->view("common/aside.php");
?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Insert Art</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Insert Art</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title">Insert Art</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
              <form role="form" id="insertArtForm" action="" onsubmit="return false" method="post">
                <div class="card-body">
				<div class="row">
					<div class="col-md-6">
	                  <div class="form-group">
	                    <label for="InputUserName">Art Title</label>
	                    <input type="text" class="form-control" id="art_title" name="art_title" placeholder="Enter Art Title" value="" required>
	                  </div>
                  	</div>
					<div class="col-md-6">
	                  <div class="form-group">
	                    <label for="InputPassword">Art Dimension</label>
	                    <input type="text" class="form-control" id="art_dimension" name="art_dimension" placeholder="Enter Art Dimension" required>
	                  </div>
                  	</div>
				</div>
				<div class="row">
					<div class="col-md-6">
	                  <div class="form-group">
	                    <label for="InputUserName">Art Description</label>
	                    <input type="text" class="form-control" id="art_description" name="art_description" placeholder="Enter Art Description" value="" required>
	                  </div>
                  	</div>
					<div class="col-md-6">
	                  <div class="form-group">
	                    <label for="InputPassword">Art Image</label>
						<input type="file" class="form-control" name="art_image" id="art_image" required>
	                  </div>
                  	</div>
				</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </div>
              </form>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
			</div>
		</div>
	</div>
</section>
<!-- /.card -->

</div>
<?php $this->load->view("common/footer.php");?>
<script>
var Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 4000
});
$("#insertArtForm").submit(function(e){
	e.preventDefault();
	var formData = new FormData(this);

	$.ajax({
		url:'<?=base_url()?>Admin/insertArtData',
		method:'post',
		data: formData,
		success: function(data){
			var result = JSON.parse(data);
			if (result.success == 1) {
				Toast.fire({
			        type: 'success',
			        title: 'Art Uploaded Successfully.!'
		    	})
				window.location.href = '<?= base_url() ?>Admin/showArt';
			}else if(result.Image_Required == 1){
				Toast.fire({
			        type: 'success',
			        title: result.Image_Required
		    	})
			}else{
				if (result.error != '') {
					Toast.fire({
				        type: 'error',
				        title: result.error
			    	})
				}else{
					alert('Something_Wrong');
				}

			}
		},
		cache:false,
		contentType:false,
		processData:false
	});

})
// function insertArt(){
// 	var formData = new FormData(this);
// 	console.log(formData);return;
// 	$.ajax({
// 		url:'include/process.php',
// 		method:'post',
// 		data:{id:1,action:'update_account',accouunt_password:accouunt_password},
// 		dataType:'text',
// 		success: function(response){
// 			if (response == 1) {
// 				alert('Admin Password Changed Successfully');
// 				$("#InputPassword").val('');
// 			}else if(response == 'Session_Expired'){
// 				alert('Your Session has Expired.!');
// 				window.location.href = base_url+"login.php";
// 			}
// 			else{
// 				alert('Something Wrong');
// 			}
// 		}
// 	})

// }
  // $(function () {
  //   $('#example2').DataTable({
  //   });
  // });
</script>


