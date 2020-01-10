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
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->
  <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>


<!-- Pop up datepicker -->
<style type="text/css">
        /* solution 1: */
        .datepicker {
            font-size: 0.875em;
        }
        /* solution 2: the original datepicker use 20px so replace with the following:*/
        
        .datepicker td, .datepicker th {
            width: 1.5em;
            height: 1.5em;
        }
        
</style>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker({
      locale: 'id',
      format: 'Y-MM-DD HH:mm',
      icons: {
        time: "fa fa-clock",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
});
</script>

<script type="text/javascript">
  $(function () {
    $('#datetimepicker2').datetimepicker({
      locale: 'id',
      format: 'Y-MM-DD HH:mm',
      icons: {
        time: "fa fa-clock",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
});
</script>


<!-- Upload foto profile -->
 <script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop()
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
 </script>

<!-- Full Calendar lama  -->
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
          var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm");
          var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm");
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
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm");
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
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm");
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm");
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
