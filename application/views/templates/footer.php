  		<!-- Footer -->
  		<footer class="sticky-footer bg-white">
  			<div class="container my-auto">
  				<div class="copyright text-center my-auto">
  					<span>Copyright &copy; Bagus Dharma 2019</span>
  				</div>
  			</div>
  		</footer>
  		<!-- End of Footer -->

  	</div>
  	<!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
  	<i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
  				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
  			</div>
  		</div>
  	</div>
  </div>

  
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

	<!-- <script>
		  $('.form-check-input').on('click', function() {
			  const menuId = $(this).data('menu');
			  const roleId = $(this).data('role');

			  $.ajax({
				url: "<?= base_url('admin/changeaccess'); ?>",
				type: 'post',
				data: {
					menuId: menuId,
					roleId: roleId
				},
				success: function() {
					document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
				} 
			  })
		  })
	</script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

 <script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop()
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
 </script>


<script>
  $(".detail").live('click',function(){
   $(".s_date").html("Detail Event for "+$(this).attr('val')+" <?php echo "$month $year";?>");
   var day = $(this).attr('val');
   var add = '<input type="button" name="add" value="Add Event" val="'+day+'" class="add_event"/>';
   $.ajax({
    type: 'post',
    dataType: 'json',
    url: "<?php echo site_url("evencal/detail_event");?>",
    data:{<?php echo "year: $year, mon: $mon";?>, day: day},
    success: function( data ) {
     var html = '';
     if(data.status){
      var i = 1;
      $.each(data.data, function(index, value) {
          if(i % 2 == 0){
        html = html+'<div class="info1"><h4>'+value.time+'<img src="<?php echo base_url();?>css/images/delete.png" class="delete" alt="" title="delete this event" day="'+day+'" val="'+value.id+'" /></h4><p>'+value.event+'</p></div>';
       }else{
        html = html+'<div class="info2"><h4>'+value.time+'<img src="<?php echo base_url();?>css/images/delete.png" class="delete" alt="" title="delete this event" day="'+day+'" val="'+value.id+'" /></h4><p>'+value.event+'</p></div>';
       } 
       i++;
      });
     }else{
      html = '<div class="message"><h4>'+data.title_msg+'</h4><p>'+data.msg+'</p></div>';
     }
     html = html+add;
     $( ".detail_event" ).fadeOut("slow").fadeIn("slow").html(html);
    } 
   });
  });
  $(".delete").live("click", function() {
   if(confirm('Are you sure delete this event ?')){
    var deleted = $(this).parent().parent();
    var day =  $(this).attr('day');
    var add = '<input type="button" name="add" value="Add Event" val="'+day+'" class="add_event"/>';
    $.ajax({
     type: 'POST',
     dataType: 'json',
     url: "<?php echo site_url("evencal/delete_event");?>",
     data:{<?php echo "year: $year, mon: $mon";?>, day: day,del: $(this).attr('val')},
     success: function(data) {
      if(data.status){
       if(data.row > 0){
        $('.d'+day).html(data.row);
       }else{
        $('.d'+day).html('');
        $( ".detail_event" ).fadeOut("slow").fadeIn("slow").html('<div class="message"><h4>'+data.title_msg+'</h4><p>'+data.msg+'</p></div>'+add);
       }
       deleted.remove();
      }else{
       alert('an error for deleting event');
      }
     }
    });
   }
  });
  $(".add_event").live('click', function(){
   $.colorbox({ 
     overlayClose: false,
     href: '<?php echo site_url('evencal/add_event');?>',
     data:{year:<?php echo $year;?>,mon:<?php echo $mon;?>, day: $(this).attr('val')}
   });
  });
</script>

</body>

</html>
