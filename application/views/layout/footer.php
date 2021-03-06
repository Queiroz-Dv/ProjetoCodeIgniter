<?php if (!$this->router->fetch_class() == 'login') : ?>
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; MX - Target <?php echo date('Y'); ?>&nbsp; | By Queiroz.Dv</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

<?php endif; ?>
<!--</div>-->
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
        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecione "Logout" para encerra sua sessão.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary btn-sm" href="<?php echo base_url('login/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('public/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('public/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('public/js/sb-admin-2.min.js'); ?>"></script>

<?php if (isset($scripts)) : ?>
<?php foreach ($scripts as $script) : ?>
<script src="<?php echo base_url('public/' . $script); ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
</body>

</html>