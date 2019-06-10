<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.1/js/mdb.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    new WOW().init();
    
    <?php if($_SESSION["msg"] == 1): ?>
    $("#paragrafo_alerta").removeClass("invisible").addClass("visible");
    <?php  endif; ?>
    
</script>
<footer class="page-footer font-small cyan darken-3 <?= $_SESSION["pagina"] == "1" ? "fixed-bottom" : "" ?>">
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="#"> Série Time</a>
    </div>
</footer>

    </body>
</html>
