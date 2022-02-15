<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('clients'); ?>">Clients</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Back" href="<?php echo base_url('clients'); ?>" class="btn btn-success btn-sm float-right"><i class="fas far-fw fa-arrow-left"></i>&nbsp; Back</a>
            </div>
            <div class="card-body">
                <form class="user" method="POST" name="form_edit">
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control form-control-user" name="clients_first_name" placeholder="First Name" value="<?php echo $client->clients_first_name; ?>">
                            <?php echo form_error('clients_first_name', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control form-control-user" name="clients_last_name" placeholder="Last Name" value="<?php echo $client->clients_last_name; ?>">
                            <?php echo form_error('clients_last_name', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-2">
                            <label>NIN</label>
                            <input type="text" class="form-control form-control-user" name="clients_cpf_cnpj" placeholder="EIN" value="<?php echo $client->clients_cpf_cnpj; ?>">
                            <?php echo form_error('clients_cpf_cnpj', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-2">
                            <label>Identification&nbsp;(ID)</label>
                            <input type="text" class="form-control form-control-user" name="clients_sr_ie" placeholder="ID" value="<?php echo $client->clients_sr_ie; ?>">
                            <?php echo form_error('clients_sr_ie', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <?php /*SECOND ROW*/ ?>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>E-mail</label>
                            <input type="email" class="form-control form-control-user" name="clients_email" placeholder="E-mail" value="<?php echo $client->clients_email; ?>">
                            <?php echo form_error('clients_email', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-2">
                            <label>Telephone</label>
                            <input type="text" class="form-control form-control-user" name="clients_telephone" placeholder="Telephone" value="<?php echo $client->clients_telephone; ?>">
                            <?php echo form_error('clients_telephone', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-2">
                            <label>Mobile Phone</label>
                            <input type="text" class="form-control form-control-user" name="clients_phone" placeholder="Mobile Phone" value="<?php echo $client->clients_phone; ?>">
                            <?php echo form_error('clients_phone', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-2">
                            <label>Birthday</label>
                            <input type="text" class="form-control form-control-user" name="clients_birthday" value="<?php echo $client->clients_birthday; ?>">
                            <?php echo form_error('clients_birthday', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->