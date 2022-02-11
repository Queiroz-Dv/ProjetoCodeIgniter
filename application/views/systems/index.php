<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" name="form_edit">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Your name" value="<?php echo $user->first_name; ?>">
                             <?php echo form_error('first_name','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Your last name" value="<?php echo $user->last_name; ?>">
                                 <?php echo form_error('last_name','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                        <div class="col-md-4">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Your username" value="<?php echo $user->username; ?>">
                                 <?php echo form_error('username','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>E-mail&nbsp;(Login)</label>
                            <input type="email" class="form-control" name="email" placeholder="Your e-mail" value="<?php echo $user->email; ?>">
                                 <?php echo form_error('email','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-md-4">
                            <label>Active</label>
                            <select class="form-control" name="active">
                                <option value="0"<?php echo ($user->active == 0) ? 'selected' : '' ?>>No</option>
                                <option value="1"<?php echo ($user->active == 1) ? 'selected' : '' ?>>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Profile Access</label>
                            <select class="form-control" name="user_profile">
                                <option value="2"<?php echo ($user_profile->id == 2) ? 'selected' : '' ?>>Employee</option>
                                <option value="1"<?php echo ($user_profile->id == 1) ? 'selected' : '' ?>>Administrator</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Your password">
                                  <?php echo form_error('password','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label>Confirm again</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm your password">
                                <?php echo form_error('confirm_password','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->