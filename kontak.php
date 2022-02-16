<?php require_once('./config.php'); ?>
<!doctype html>
<html lang="en" id="home">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link href="assets/css/kontak.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9e512bfe3c.js" crossorigin="anonymous"></script>

    <title>Hubungi Kami</title>
    <link rel="icon" href="assets/image/isbi.png">
</head>

<body> 
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand page-scroll" href="index.php">
                <img src="./assets/image/isbi.png" width="45" class="d-inline-block"> &nbsp; ISBI Bandung
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link page-scroll" href="#"><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="kegiatan.php">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="gedung.php">Gedung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="kontak.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR AKHIR -->

    <section>
        <div class="container2">
            <div class="contactInfo">
                <div>
                    <h2>HUBUNGI KAMI</h2>
                    <ul class="info">
                        <li>
                            <span><img src="assets/icons/home.png"></span>
                            <span><?= $_settings->info('address') ?></span>
                        </li>
                        <li>
                            <span><img src="assets/icons/email.png"></span>
                            <span><?= $_settings->info('email') ?></span>
                        </li>
                        <li>
                            <span><img src="assets/icons/web.png"></span>
                            <span><?= $_settings->info('website') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="contactForm">
            <form action="kontak_btamu.php" method="post">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" minlength="2" maxlength="50" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" onkeypress="return event.charCode < 48 || event.charCode  >57" required="required">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" maxlength="15" class="form-control" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <=57" id="phone" placeholder="contoh : 628912345678" required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instansi">Instansi</label>
                            <input type="text" maxlength="100" class="form-control" name="instansi" id="instansi" placeholder="Instansi" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" maxlength="320" class="form-control" maxlength="14" name="email" id="email" placeholder="email@gmail.com" required="required">
                    </div>
                    <div class="form-group">
                        <label for="pesan">Message</label>
                        <textarea type="text" class="form-control" rows="5" name="pesan" id="pesan" placeholder="Message" required="required"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <!--FOOTER-->
    <?php require_once('inc/footer.php') ?>
    <!--AKHIR FOOTER-->
    <script>
        $('.carousel').carousel({
            interval: 2000 * 10
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>