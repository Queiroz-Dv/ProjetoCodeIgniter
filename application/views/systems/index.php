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
        </nav <?php if ($message = $this->session->flashdata('success')) : ?> <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class='fas far-fw fa-check'></i>&nbsp; &nbsp;<?php echo $message; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($message = $this->session->flashdata('error')) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><i class='fas far-fw fa-exclamation-triangle'></i>&nbsp; &nbsp;<?php echo $message; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- DataTales Example -->
<div class="card shadow mb-5">
    <div class="card-body">
        <form class="user" method="POST" name="form_edit">

            <div class="form-group row mb-4">
                <div class="col-md-3">
                    <label>Company Name</label>
                    <input type="text" class="form-control form-control-user" name="systems_company_name" placeholder="Company Name" value="<?php echo $systems->systems_company_name; ?>">
                    <?php echo form_error('systems_company_name', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-3">
                    <label>Trading Name</label>
                    <input type="text" class="form-control form-control-user" name="systems_trading_name" placeholder="Trading Name" value="<?php echo $systems->systems_trading_name; ?>">
                    <?php echo form_error('systems_trading_name', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-4">
                    <label>Employee In. Number</label>
                    <input type="text" class="form-control form-control-user nin" name="systems_national_in_number" placeholder="Employer Identification Number" value="<?php echo $systems->systems_national_in_number; ?>">
                    <?php echo form_error('systems_national_in_number', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-3">
                    <label>Telephone</label>
                    <input type="text" class="form-control form-control-user phone_with_ddd" name="systems_telephone" placeholder="Telephone" value="<?php echo $systems->systems_telephone; ?>">
                    <?php echo form_error('systems_telephone', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-3">
                    <label>Mobile Phone</label>
                    <input type="text" class="form-control form-control-user phone_with_ddd" name="systems_mobile_phone" placeholder="Mobile Phone" value="<?php echo $systems->systems_mobile_phone; ?>">
                    <?php echo form_error('systems_mobile_phone', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-3">
                    <label>Site</label>
                    <input type="text" class="form-control form-control-user" name="systems_site_url" placeholder="Site" value="<?php echo $systems->systems_site_url; ?>">
                    <?php echo form_error('systems_site_url', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-3">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-user" name="systems_email" placeholder="Email" value="<?php echo $systems->systems_email; ?>">
                    <?php echo form_error('systems_email', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-3">
                    <label>Address</label>
                    <input type="text" class="form-control form-control-user" name="systems_address" placeholder="Address" value="<?php echo $systems->systems_address ?>">
                    <?php echo form_error('systems_address', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-2">
                    <label>Post-Code</label>
                    <input type="text" class="form-control form-control-user post_code" name="systems_post_code" placeholder="Zip Code" value="<?php echo $systems->systems_post_code; ?>">
                    <?php echo form_error('systems_post_code', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-2">
                    <label>Number</label>
                    <input type="text" class="form-control form-control-user" name="systems_number" placeholder="Number" value="<?php echo $systems->systems_number; ?>">
                    <?php echo form_error('systems_number', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-2">
                    <label>City</label>
                    <input type="text" class="form-control form-control-user" name="systems_city" placeholder="City" value="<?php echo $systems->systems_city; ?>">
                    <?php echo form_error('systems_city', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="col-md-2">
                    <label>State</label>
                    <input type="text" class="form-control form-control-user st" name="systems_state" placeholder="State" value="<?php echo $systems->systems_state; ?>">
                    <?php echo form_error('systems_state', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-12">
                    <label>Order and Service's Text</label>
                    <textarea class="form-control form-control-user" name="systems_txt_service_order" placeholder="Type here..."><?php echo $systems->systems_txt_service_order ?></textarea>>
                    <?php echo form_error('systems_txt_service_order', '<small class="form-text text-danger">', '</small>'); ?>
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