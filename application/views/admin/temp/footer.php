</div>
<!-- /.content-wrapper -->
<footer class="main-footer bg">
    <strong>Copyright &copy; 2019 - <?= date('Y');?> Batra Kosmetik.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript">
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

  $(function(){
    $('.form-select').on('click', function(){
      const subMenu_id = $(this).data('subMenu');
      const role_id = $(this).data('role');
      $(function(){})
      $.ajax({
        url: "<?= base_url('admin/role_access/accessRoleChange/') ?>",
        type: 'post',
        data: {
          role_id: role_id,
          subMenu_id: subMenu_id
        },
        success:function(){
          document.location.href = "<?= base_url('admin/role_access/tampilMenuAccess/') ?>" + role_id; 
        }
      });
    });
  });
</script>

<!-- ckeditor -->
<!-- meload file ck editor -->
<!-- <script type="text/javascript" src="<?= base_url() ;?>assets/ckeditor5-build-classic/ckeditor.js"></script>
<script type="text/javascript">
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
      // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( err => {
      console.error( err.stack );
    } );
</script>
<script type="text/javascript">
  ClassicEditor
    .create( document.querySelector( '#editor2' ), {
      // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( err => {
      console.error( err.stack );
    } );
</script> -->
</body>
</html>