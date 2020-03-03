 <script src="boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="boostrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="boostrap/vendor/chart.js/Chart.min.js"></script>
  <script src="boostrap/vendor/datatables/jquery.dataTables.js"></script>
  <script src="boostrap/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="boostrap/js/sb-admin.min.js"></script>
  <script src="boostrap/js/jquery.tabledit.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="boostrap/js/demo/datatables-demo.js"></script>
  <script src="boostrap/js/demo/chart-area-demo.js"></script>

   <script type="text/javascript" src="../user/boostrap2/dist/js/jquery.smartWizard.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function(){

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
            });

            // Toolbar extra buttons

            // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
            // so that option is disabling => showStepURLhash: false

            // Smart Wizard 1
            $('#smartwizard').smartWizard({
                    selected: 3,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: false,
            });
        });
    </script>
    <script type="text/javascript">
    $('.update').editable({
           url: '../aksi/admin/edit.php',
           type: 'text',
           pk: 1,
           name: 'tipe_menara',
           title: 'Edit Tipe Menara'
    });

    $(function(){
            $(document).on('click','.delete-menara',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id') }
                );
            });
    });
</script>