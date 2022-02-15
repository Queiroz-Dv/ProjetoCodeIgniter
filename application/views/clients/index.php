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
        <?php if ($message = $this->session->flashdata('success')) : ?>
            <div class="row">
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Register new client" href="<?php echo base_url('clients/add'); ?>" class="btn btn-success btn-sm float-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>&nbsp;New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>EIN</th>
                                <th>Client Type</th>
                                <th class="text-center">Client Active</th>
                                <th class="text-right sorting_asc_disabled sorting_desc_disabled pr-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client) : ?>
                                <tr>
                                    <td><?php echo $client->clients_id ?></td>
                                    <td><?php echo $client->clients_first_name ?></td>
                                    <td><?php echo $client->clients_last_name ?></td>
                                    <td><?php echo $client->clients_cpf_cnpj ?></td>
                                    <td><?php echo ($client->clients_type == 1 ? 'Natural Person' : 'Legal Person') ?></td>
                                    <td class="text-center pr-4"><?php echo ($client->clients_active == 1 ? '<span class="badge badge-info btn-sm">Yes</span>' : '<span class="badge badge-warning btn-sm">No</span>') ?></td>
                                    <td class="text-right">
                                        <a title="Edit" href="<?php echo base_url('clients/edit/' . $client->clients_id); ?>" class="btn btn-sm btn-primary"><i class="fas far-fw fa-user-edit"></i></a>
                                        <a title="Delete" href="javascript(void)" data-toggle="modal" data-target="#clients-<?php echo $client->clients_id; ?>" class="btn btn-sm btn-danger"><i class='fas far-fw fa-user-minus'></i></a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="clients-<?php echo $client->clients_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this client?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Click in "Yes" if you would like to exclude the resgiter</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">No</button>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url('clients/del/' . $client->clients_id); ?>">Yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->