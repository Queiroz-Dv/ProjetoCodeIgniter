<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('users'); ?>">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Back" href="<?php echo base_url('users'); ?>" class="btn btn-success btn-sm float-right"><i class="fas far-fw fa-arrow-left"></i>&nbsp; Back</a>
            </div>
            <div class="card-body">
                <form method="POST" name="form_add">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Your name" value="<?php echo set_value('first_name'); ?>">
                                <?php echo form_error('first_name', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Your last name" value="<?php echo set_value('last_name'); ?>">
                                <?php echo form_error('last_name', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Your username" value="<?php echo set_value('username'); ?>">
                                <?php echo form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>E-mail&nbsp;(Login)</label>
                            <input type="email" class="form-control" name="email" placeholder="Your e-mail" value="<?php echo set_value('email'); ?>">
                                <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-md-4">
                            <label>Active</label>
                            <select class="form-control" name="active">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Profile Access</label>
                            <select class="form-control" name="user_profile">
                                <option value="2">Employee</option>
                                <option value="1">Administrator</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Your password">
                                <?php echo form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label>Confirm again</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm your password">
                                <?php echo form_error('confirm_password', '<small class="form-text text-danger">', '</small>'); ?>
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