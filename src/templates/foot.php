
    <?php
        //Jos tämän footerin sivulla on aktiivinen sessio ja 
        //käyttäjä asetettu, näytetään log out -nappi.
        if(isset($_SESSION["username"])){
            echo '<form action="/work/src/modules/logout.php">
            <input type="submit" class="btn btn-primary" value="Log out">
            </form>';
        }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>