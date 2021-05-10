

<br>
    <div class="container">
        <table class="table">
                        
            <tr>
                <th scope="col">Nick</th>
                <th scope="col">Email</th>
                <th scope="col">Accion</th>
            </tr>
                <?php  foreach($usuarios as $user)  {?>
                    <tr scope="row">
                        <td><?php echo $user->nick;  ?></td>
                        <td><?php echo $user->email;  ?></td>
                        <td><a href="<?php echo base_url(); ?>/editar?id=<?php echo $user->id; ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="<?php echo base_url(); ?>/borrar?id=<?php echo $user->id; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php  } ?>
        </table>
    </div>
<br>
