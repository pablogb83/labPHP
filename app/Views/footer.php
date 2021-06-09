
<div class="container" style="margin-top: 45px;">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#BE73EF; height: 300px;">
        <div class="container-fluid">
            <div id="columnas">
                <li style="color:azure"><b>Acerca de</b></li>
                <a href="">
                    <li style="color:azure">Acerca de Truchomeo</li>
                </a>
                <a href="">
                    <li style="color:azure">Prensa</li>
                </a>
                <a href="">
                    <li style="color:azure">Nuestro Blog</li>
                </a>
                <a href="">
                    <li style="color:azure">Contactanos</li>
                </a>
                <a href="">
                    <li style="color:azure">Truchomeo para empresas</li>
                </a>
                <li style="color:azure"><b>Ayuda</b></li>
                <a href="">
                    <li style="color:azure">Ayuda</li>
                </a>
                <a href="">
                    <li style="color:azure">Accesibilidad</li>
                </a>
                <a href="">
                    <li style="color:azure">Ayuda para compra</li>
                </a>
                <a href="">
                    <li style="color:azure">Editores</li>
                </a>
                <a href="">
                    <li style="color:azure">Preguntas frecuentes</li>
                </a>
                <li style="color:azure"><b>Legal</b></li>
                <a href="">
                    <li style="color:azure">Terminos</li>
                </a>
                <a href="">
                    <li style="color:azure">Privacidad</li>
                </a>
                <a href="">
                    <li style="color:azure">Copyright</li>
                </a>
            </div>

        </div>
    </nav>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/multiple-select.js"></script>

<script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>

<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script>
    $('#modal-agrega').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script>
    $('#modal-guardar').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>


</body>

</html>