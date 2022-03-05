<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('users'); ?>">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a title="Back" href="<?php echo base_url('usuarios'); ?>" class="btn btn-success btn-sm float-right"><i
            class="fas far-fw fa-arrow-left"></i>&nbsp; Voltar</a>
      </div>
      <div class="card-body">
        <form method="POST" name="form_add">

          <div class="form-group row">

            <div class="col-md-4">

              <label>Nome</label>
              <input type="text" class="form-control" name="first_name" placeholder="Digite o nome..."
                value="<?php echo set_value('first_name'); ?>">
              <?php echo form_error('first_name', '<small class="form-text text-danger">', '</small>'); ?>
            </div>

            <div class="col-md-4">

              <label>Sobrenome</label>
              <input type="text" class="form-control" name="last_name" placeholder="Digite o sobrenome..."
                value="<?php echo set_value('last_name'); ?>">
              <?php echo form_error('last_name', '<small class="form-text text-danger">', '</small>'); ?>
            </div>

            <div class="col-md-4">
              <label>E-mail&nbsp;(Login)</label>
              <input type="email" class="form-control" name="email" placeholder="Digite seu e-mail..."
                value="<?php echo set_value('email'); ?>">
              <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
            </div>

          </div>

          <div class="form-group row">

            <div class="col-md-4">
              <label>Usuario</label>
              <input type="text" class="form-control" name="username" placeholder="Digite seu usuário"
                value="<?php echo set_value('username'); ?>">
              <?php echo form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
            </div>

            <div class="col-md-4">
              <label>Ativo</label>
              <select class="form-control" name="active">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>

            <div class="col-md-4">
              <label>Perfil de Acesso</label>
              <select class="form-control" name="perfil_usuario">
                <option value="2">Vendedor</option>
                <option value="1">Administrador</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label>Senha</label>
              <input type="password" class="form-control" name="password" placeholder="Digite sua senha...">
              <?php echo form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
            </div>

            <div class="col-md-6">
              <label>Confirme sua senha</label>
              <input type="password" class="form-control" name="confirm_password" placeholder="****">
              <?php echo form_error('confirm_password', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>