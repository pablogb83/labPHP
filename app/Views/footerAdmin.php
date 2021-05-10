    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Truchameo <?php echo date('Y') ?></div>
                <div>
                    <a href="#"><i class="fab fa-instagram"></i> Instagaram</a>
                    &middot;
                    <a href="#">Terminos &amp; Condiciones</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>

    <script>
        $('#modal-confirma').on('show.bs.modal', function(e){
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });

    </script>

    </body>

</html>