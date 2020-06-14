<?php
$this->load->view("common/header.php");
$this->load->view("common/aside.php");
?>
<style type="text/css">

.wrap{
white-space: nowrap;
}
</style>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
  <!--               <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button> -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Show Art</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="wrap">Id</th>
                  <th class="wrap">Art Title</th>
                  <th class="wrap">Art Deimension</th>
                  <th class="wrap">Art Description</th>
                  <th class="wrap">Art Image</th>
                  <th style='width: 20%;'>Action</th>
                </tr>
                </thead>
                <tbody id="data1">
<!-- 					<?php if (!empty($getCustomer)) { 
						foreach ($getCustomer as $getCustomers) {
 ?>
					<tr>
	                  <td><?= $getCustomers['id'] ?></td>
	                  <td><?= $getCustomers['name'] ?></td>
	                  <td><?= $getCustomers['service_name'] ?></td>
	                  <td><?= $getCustomers['email'] ?></td>
	                  <td><?= $getCustomers['country'] ?></td>
	                  <td><?= $getCustomers['updated_on'] ?></td>
	                  <td><?= $getCustomers['ip_address'] ?></td>
	                  <td><a href="#" onclick="getUserDetails('<?=$getCustomers['id']?>');"><span style="cursor:pointer;color:brown;" title="Edit it!" class="far fa-edit"></span></a> | 
<a href="#" onclick="getUserDetails(\''.$getCustomers['id'].'\');" ><span style="cursor:pointer;color:brown;" title="Edit it!" class="far fa-edit"></span></a> | 
                    <a class="fa fa-trash" title="Remove it" style="color:#b34a4a" href=""></a>
                    <a href="#" onclick="changeUserStatus('<?=$getCustomers['id']?>','<?=$getCustomers['status']?>');" id="activate_link" style="color:blue;" ><?= (!empty($getCustomers['status']) && $getCustomers['status'] == 3) ? 'DeActive' : 'Active'; ?></a> </td>
	                </tr>
				<?php	} } ?> -->
	                
				</tbody>
				<tfoot>
					<th>Id</th>
					<th>Art Title</th>
					<th>Art Deimension</th>
					<th>Art Description</th>
					<th>Art Image</th>
					<th>Action</th>
                </tfoot>
              </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            
          </div>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	</div>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<?php $this->load->view("common/footer.php");?>

<script>
$(document).ready(function(){


	getAllData();
// var Toast = Swal.mixin({
// toast: true,
// position: 'top-end',
// showConfirmButton: false,
// timer: 3000
// });

                        // Toast.fire({
                            // type: 'success',
                            // title: ' You are Successfully Login.!'
                        // })
})
function getAllData(){
	$.ajax({
		url:'<?=base_url()?>/Admin/showArtData',
		method:'post',
		dataType:'text',
		success: function(response){
			$('#example2').dataTable().fnDestroy();
			$('#data1').empty();
			$("#data1").html(response);
    		$('#example2').DataTable();
		}
	})
}
function getUserDetails(id){

	alert(id);
	$("#modal-lg").modal('show');
}
function deleteArt(id){
var Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000
});
if (confirm("Are You Sure You Want To Delete Art!")) {
	$.ajax({
		url:'<?=base_url()?>/Admin/deleteArt',
		method:'post',
		data:{id:id},
		success: function(response){
			Toast.fire({
                type: 'success',
                title: 'Art Deleted Successfully.!'
            })
			getAllData();
		}
	})
	}else{
	}
}
function deleteCustomer(id){
var Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000
});
if (confirm("Are You Sure You Want To Delete a Customer!")) {
	$.ajax({
		url:'include/process.php',
		method:'post',
		data:{id:id,deleteU:1},
		dataType:'json',
		success: function(response){
			if (response == 1) {
				Toast.fire({
                    type: 'success',
                    title: 'Customer Deleted Successfully.!'
                })
				getAllData();
			}else if(response == 'Session_Expired'){
				alert('Your Session has Expired.!');
				window.location.href = base_url+"login.php";
			}
			else{
				alert('Something Wrong');
			}
		}
	})
	}else{
	}
}
function blockCustomer(id,ip,name,status){
var Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000
});
if (ip == '') {
	Toast.fire({
        type: 'error',
        title: "Customer don't have a IP Address Yet.!"
    })
}
if (status == 3) {
if (confirm("Are You Sure You Want To Change Customer Status!")) {
	$.ajax({
		url:'include/process.php',
		method:'post',
		data:{id:id,BlockUser:1,ipAdr:ip},
		dataType:'json',
		success: function(response){
			if (response == 1) {
				Toast.fire({
                    type: 'success',
                    title: name+' Blocked Successfully.!'
                })
				getAllData();
			}else if(response == 'Session_Expired'){
				alert('Your Session has Expired.!');
				window.location.href = base_url+"login.php";
			}
			else{
				alert('Something Wrong');
			}
		}
	})
	}
	}else if(status == 2){
		if (confirm("Are You Sure You Want To Change Customer Status!")) {
			$.ajax({
				url:'include/process.php',
				method:'post',
				data:{id:id,UnBlockUser:1,ipAdr:ip},
				dataType:'json',
				success: function(response){
					if (response == 1) {
						Toast.fire({
		                    type: 'success',
		                    title: name+' UnBlocked Successfully.!'
		                })
						getAllData();
					}else if(response == 'Session_Expired'){
						alert('Your Session has Expired.!');
						window.location.href = base_url+"login.php";
					}
					else{
						alert('Something Wrong');
					}
				}
			})
		}
	}
}
  $(function () {
    $('#example2').DataTable({
    });
  });
</script>