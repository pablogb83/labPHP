<div class="container">

    <div class="row">

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($recursos as $recurso) { ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="images/<?php echo $recurso->rutaImg ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo strtoupper($recurso->nombre) ?></h5>
                            <p class="card-text"><?php echo strtoupper($recurso->tipo) ?></p>
                            <p class="card-text"><?php echo $recurso->descripcion ?></p>
                            <p class="card-text"><?php echo $recurso->created_at ?></p>

                            <tr>
                                <td> <?php $cont = 0;
                                        $cont2 = 0;
                                        while ($cont < $recurso->nota || $cont2 < 5) {

                                            if ($cont < $recurso->nota) {
                                                echo '<span class="fa fa-star checked"></span>';
                                                $cont++;
                                                $cont2++;
                                            } else {
                                                echo '<span class="fa fa-star"></span>';
                                                $cont2++;
                                            }
                                        }

                                        ?> </td>
                            </tr>
                                    <br><br>
                            <a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>" class="btn btn-light">Leer mas...</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</div>