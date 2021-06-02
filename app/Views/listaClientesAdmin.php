<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Clientes</h1>

            <div class="card mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nick</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Accion</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nick</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($usuarios as $user) { ?>
                                    <tr>
                                        <td><?php echo $user->nick;  ?></td>
                                        <td><?php echo $user->email;  ?></td>
                                        <td><?php if ($user->cliente->suscripto == 1){ echo 'SUSCRIPTO';} else {echo 'NO';}  ?></td>
                                        <td><a href="<?php echo base_url(); ?>/editar?id=<?php echo $user->id; ?>" class="btn btn-warning" role="button"><i class="fas fa-user-edit"></i></a>
                                        <a href="#" data-href="<?php echo base_url(); ?>/borrar?id=<?php echo $user->id; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Confirma que desea eliminar el registro</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Confirma</a>
                </div>
            </div>
        </div>
    </div>