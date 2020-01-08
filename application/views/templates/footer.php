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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


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
  $(document).ready(function(){
    var calendar = $('#calendar').fullCalendar({
      editable:true,
      header:{
        left:'prev,next,today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
      },
      events:"<?php echo base_url(); ?>calendar/load",
      selectable:true,
      selectHelper:true,
      select:function(start, end, allDay)
      {
        var title = prompt("Enter Event Title");
        if(title)
        {
          var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
          $.ajax({
            url:"<?= base_url(); ?>calendar/insert",
            type:"POST",
            data:{title:title, start:start, end:end},
            success:function()
            {
              calendar.fullCalendar('refetchEvents');
              alert("Added Successfully");
            }
          })
        }
      },
      editable:true,
      eventResize:function(event)
      {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
        var title = event.title;

        var id = event.id;
        $.ajax({
          url:"<?= base_url(); ?>calendar/update",
          type:"POST",
          data:{title:title, start:start, end:end},
          success:function()
          {
            calendar.fullCalendar('refetchEvents');
            alert("Event Update");
          }
        })
      },
      eventDrop:function(event)
      {
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        var title = event.title;
        var id = event.id;
        $.ajax({
          url:"<?= base_url(); ?>calendar/update",
          type:"POST",
          data:{title:title, start:start, end:end, id:id},
          success:function()
          {
            calendar.fullCalendar('refetchEvents');
            alert("Event Update");
          }
        })
      },
      eventClick:function(event)
      {
        if(confirm("Are you sure want to remove it ? "))
        {
          var id = event.id;
          $.ajax({
            url:"<?= base_url(); ?>calendar/delete",
            type:"POST",
            data:{id:id},
            success:function()
            {
              calendar.fullCalendar('refetchEvents');
              alert('Event Removed');
            }
            
          })
        }
      }
    });
  });
</script>

</body>

</html>
