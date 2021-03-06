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

            <div class="card-body">

                <form class="user" method="POST" name="form_edit">
                    <p>
                        <strong>
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                    <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
                                </svg></i>&nbsp;&nbsp;Last Update:&nbsp;
                        </strong><?php echo format_date_with_hour($client->clients_change_date); ?>
                    </p>
                    <?php /* FIELDSET 1*/ ?>
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z" />
                                </svg>
                            </i>&nbsp;Personal Data
                        </legend>
                        <?php /*First row's personal fieldset*/ ?>
                        <div class="form-group row mb-3">

                            <div class="col-md-3">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-user" name="clients_first_name" placeholder="Client's first name" value="<?php echo $client->clients_first_name; ?>">
                                <?php echo form_error('clients_first_name', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control form-control-user" name="clients_last_name" placeholder="Client's last name" value="<?php echo $client->clients_last_name; ?>">
                                <?php echo form_error('clients_last_name', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-3">
                                <label>Birthday</label>
                                <input type="text" class="form-control form-control-user-date" name="clients_birthday" value="<?php echo $client->clients_birthday; ?>">
                                <?php echo form_error('clients_birthday', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <?php /*Second row's personal fieldset*/ ?>
                        <div class="form-group row mb-3">

                            <div class="col-md-6">
                                <?php if ($client->clients_type == 1) : ?>
                                    <label>NIN</label>
                                    <input type="text" class="form-control form-control-user nin" name="clients_nin" placeholder="Client's NIN" value="<?php echo $client->clients_nin_tin; ?>">
                                    <?php echo form_error('clients_nin_tin', '<small class="form-text text-danger">', '</small>'); ?>
                                <?php else : ?>
                                    <label>TIN</label>
                                    <input type="text" class="form-control form-control-user tin" name="clients_tin" placeholder="Client's TIN" value="<?php echo $client->clients_nin_tin; ?>">
                                    <?php echo form_error('clients_nin_tin', '<small class="form-text text-danger">', '</small>'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input type="email" class="form-control form-control-user" name="clients_email" placeholder="Client's e-mail" value="<?php echo $client->clients_email; ?>">
                                <?php echo form_error('clients_email', '<small class="form-text text-danger">', '</small>'); ?>

                            </div>

                        </div>

                        <?php /*Third row's peronsal fieldset*/ ?>
                        <div class="form-group row mb-3">

                            <div class="col-md-6">
                                <label>Telephone</label>
                                <input type="text" class="form-control form-control-user phone_with_ddd" name="clients_telephone" placeholder="Client's telephone" value="<?php echo $client->clients_telephone; ?>">
                                <?php echo form_error('clients_telephone', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label>Phone</label>
                                <input type="text" class="form-control form-control-user phone_with_ddd" name="clients_phone" placeholder=" Client's mobile phone" value="<?php echo $client->clients_phone; ?>">
                                <?php echo form_error('clients_phone', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>
                    </fieldset>

                    <?php /*FIELDSET 2*/ ?>
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </i>&nbsp;Address Data
                        </legend>
                        <?php /*First row's address fieldset*/ ?>
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label>Address</label>
                                <input type="text" class="form-control form-control-user" name="clients_address" placeholder="Address" value="<?php echo $client->clients_address; ?>">
                                <?php echo form_error('clients_address', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Country Code</label>
                                <input type="text" class="form-control form-control-user" name="clients_country_code" placeholder="C. Code" value="<?php echo $client->clients_country_code; ?>">
                                <?php echo form_error('clients_country_code', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Number</label>
                                <input type="text" class="form-control form-control-user" name="clients_address" placeholder="Number" value="<?php echo $client->clients_number; ?>">
                                <?php echo form_error('clients_number', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Complement</label>
                                <input type="text" class="form-control form-control-user" name="clients_complement" placeholder="Complement" value="<?php echo $client->clients_complement; ?>">
                                <?php echo form_error('clients_complement', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <?php /*Second row's address fieldset*/ ?>
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label>District</label>
                                <input type="text" class="form-control form-control-user" name="clients_address" placeholder="District" value="<?php echo $client->clients_address; ?>">
                                <?php echo form_error('clients_address', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Post-Code</label>
                                <input type="text" class="form-control form-control-user" name="clients_post_code" placeholder="Post-Code" value="<?php echo $client->clients_post_code; ?>">
                                <?php echo form_error('clients_post_code', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-5">
                                <label>City</label>
                                <input type="text" class="form-control form-control-user" name="clients_city" placeholder="Client's city" value="<?php echo $client->clients_city; ?>">
                                <?php echo form_error('clients_city', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-1">
                                <label>State</label>
                                <input type="text" class="form-control form-control-user st" name="clients_state" placeholder="ST" value="<?php echo $client->clients_state; ?>">
                                <?php echo form_error('clients_state', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </fieldset>

                    <?php /*FIELDSET 3*/ ?>
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small">
                            <i class="fas fa-fw fa-tools"></i>&nbsp;Configurations
                        </legend>
                        <div>
                            <div class="col-md-4">
                                <label>Client Activate</label>
                                <select class="custom-select" name="clients_active">
                                    <option value="0" <?php echo ($client->clients_active == 0 ? 'selected' : ''); ?>>No</option>
                                    <option value="1" <?php echo ($client->clients_active == 1 ? 'selected' : ''); ?>>Yes</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label>Obs</label>
                                <textarea class="form-control form-control-user" name="clients_obs"><?php echo $client->clients_obs; ?></textarea>
                                <?php echo form_error('clients_obs', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <input type="hidden" name="clients_type" value="<?php echo $client->clients_type; ?>" />
                        <input type="hidden" name="clients_id" value="<?php echo $client->clients_id; ?>" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a title="Back" href="<?php echo base_url('clients'); ?>" class="btn btn-success btn-sm ml-2">Back</a>
                </form>

            </div>
        </div>