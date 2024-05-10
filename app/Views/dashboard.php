<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omah Ingkung</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./public/vendors/feather/feather.css">
    <link rel="stylesheet" href="./public/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./public/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="./public/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="./public/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./public/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./public/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar nav-light default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-light navbar-brand-wrapper d-flex align-items-center justify-content-start pl-3">
                <div>
                    <a class="navbar-brand brand-logo">
                        <h2>Omah</h2>
                        <h1>Ingkung</h1>
                    </a>
                    <a class="navbar-brand brand-logo-mini">
                        <h1>OI</h1>
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top"> 
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold"><?= session()->get("nama") ?></span></h1>
                        <h3 class="welcome-sub-text">Silahkan Pilih Menu Favorite Kalian!</h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-social-icon-text btn-warning" onclick="bukaModalKeranjang()"><i class="mdi mdi-cart-outline"></i>Pesanan <b id="jmlPesanan">(0)</b></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-social-icon-text btn-google" onclick="bukaModalLogin()"><i class="mdi mdi-account-outline"></i>Admin</button>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="contaier-fluid page-body-wrapper">
            <div class="main-panel" style="margin-left: auto; margin-right: auto;">
                <?php if ($makanan) : ?>
                    <div class="content-wrapper text-center">
                        <h2 class="text-white">Daftar Makanan</h2>
                        <hr>
                        <div class="row">
                            <?php for ($i = 0; $i < count($makanan); $i++) : 
                                if ($makanan[$i]["jenis"] == 1) : ?>
                                    <div class="col-lg-3 grid-margin stretch-card">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body p-0">
                                                <img src="<?= base_url() ?>/public/images/menu/<?= $makanan[$i]["foto"] ?>" class="card-img-top" <?php if ($makanan[$i]["status"] == 0) {
                                                                                                                                                        echo 'style = "filter: grayscale(100%); -webkit-filter: grayscale(100%);"';
                                                                                                                                                    }?> alt="">
                                                <div class="card-body text-center">
                                                    <h5><?= $makanan[$i]["nama"]?></h5>
                                                    <i>Rp. <?= $makanan[$i]["harga"] ?></i><br>
                                                    <button class="btn btn-warning btn-sm btn-fw mt-2" <?php if ($makanan[$i]["status"] == 0) {
                                                                                                            echo "disabled"; 
                                                                                                        } ?> onclick='tambahPesanan(<?= $makanan[$i]["id"] ?>, "<?= $makanan[$i]["nama"] ?>", <?= $makanan[$i]["harga"] ?> )'><?php if ($makanan[$i]["status"] == 0) {
                                                                                                                                                                                                                                    echo "Habis";                     
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo "Tambah";                            
                                                                                                                                                                                                                                } ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                endif;
                            endfor;
                            ?>
                        </div>
                    </div>
                <?php 
                endif;
                if ($snack) : ?>
                    <div class="content-wrapper text-center">
                        <h2 class="text-white">Daftar Snack</h2>
                        <hr>
                        <div class="row">
                            <?php for ($i = 0; $i < count($snack); $i++) : 
                                if ($snack[$i]["jenis"] == 2) : ?>
                                    <div class="col-lg-3 grid-margin stretch-card">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body p-0">
                                                <img src="<?= base_url() ?>/public/images/menu/<?= $snack[$i]["foto"] ?>" class="card-img-top" <?php if ($snack[$i]["status"] == 0) {
                                                                                                                                                        echo 'style = "filter: grayscale(100%); -webkit-filter: grayscale(100%);"';
                                                                                                                                                    }?> alt="">
                                                <div class="card-body text-center">
                                                    <h5><?= $snack[$i]["nama"]?></h5>
                                                    <i>Rp. <?= $snack[$i]["harga"] ?></i><br>
                                                    <button class="btn btn-warning btn-sm btn-fw mt-2" <?php if ($snack[$i]["status"] == 0) {
                                                                                                            echo "disabled"; 
                                                                                                        } ?> onclick='tambahPesanan(<?= $snack[$i]["id"] ?>, "<?= $snack[$i]["nama"] ?>", <?= $snack[$i]["harga"] ?> )'><?php if ($snack[$i]["status"] == 0) {
                                                                                                                                                                                                                                    echo "Habis";                     
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo "Tambah";                            
                                                                                                                                                                                                                                } ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                endif;
                            endfor;
                            ?>
                        </div>
                    </div>
                <?php endif;
                if ($minuman) : ?>
                    <div class="content-wrapper text-center">
                        <h2 class="text-white">Daftar Minuman</h2>
                        <hr>
                        <div class="row">
                            <?php for ($i = 0; $i < count($minuman); $i++) : 
                                if ($minuman[$i]["jenis"] == 3) : ?>
                                    <div class="col-lg-3 grid-margin stretch-card">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body p-0">
                                                <img src="<?= base_url() ?>/public/images/menu/<?= $minuman[$i]["foto"] ?>" class="card-img-top" <?php if ($minuman[$i]["status"] == 0) {
                                                                                                                                                        echo 'style = "filter: grayscale(100%); -webkit-filter: grayscale(100%);"';
                                                                                                                                                    }?> alt="">
                                                <div class="card-body text-center">
                                                    <h5><?= $minuman[$i]["nama"]?></h5>
                                                    <i>Rp. <?= $minuman[$i]["harga"] ?></i><br>
                                                    <button class="btn btn-warning btn-sm btn-fw mt-2" <?php if ($minuman[$i]["status"] == 0) {
                                                                                                            echo "disabled"; 
                                                                                                        } ?> onclick='tambahPesanan(<?= $minuman[$i]["id"] ?>, "<?= $minuman[$i]["nama"] ?>", <?= $minuman[$i]["harga"] ?> )'><?php if ($minuman[$i]["status"] == 0) {
                                                                                                                                                                                                                                    echo "Habis";                     
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo "Tambah";                            
                                                                                                                                                                                                                                } ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                endif;
                            endfor;
                            ?>
                        </div>
                    </div>
                <?php endif;
                if ($paketHemat) : ?>
                    <div class="content-wrapper text-center">
                        <h2 class="text-white">Daftar Paket Hemat</h2>
                        <hr>
                        <div class="row">
                            <?php for ($i = 0; $i < count($paketHemat); $i++) : 
                                if ($paketHemat[$i]["jenis"] == 4) : ?>
                                    <div class="col-lg-3 grid-margin stretch-card">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body p-0">
                                                <img src="<?= base_url() ?>/public/images/menu/<?= $paketHemat[$i]["foto"] ?>" class="card-img-top" <?php if ($paketHemat[$i]["status"] == 0) {
                                                                                                                                                        echo 'style = "filter: grayscale(100%); -webkit-filter: grayscale(100%);"';
                                                                                                                                                    }?> alt="">
                                                <div class="card-body text-center">
                                                    <h5><?= $paketHemat[$i]["nama"]?></h5>
                                                    <i>Rp. <?= $paketHemat[$i]["harga"] ?></i><br>
                                                    <button class="btn btn-warning btn-sm btn-fw mt-2" <?php if ($paketHemat[$i]["status"] == 0) {
                                                                                                            echo "disabled"; 
                                                                                                        } ?> onclick='tambahPesanan(<?= $paketHemat[$i]["id"] ?>, "<?= $paketHemat[$i]["nama"] ?>", <?= $paketHemat[$i]["harga"] ?> )'><?php if ($paketHemat[$i]["status"] == 0) {
                                                                                                                                                                                                                                    echo "Habis";                     
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo "Tambah";                            
                                                                                                                                                                                                                                } ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                endif;
                            endfor;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Modal -->
                <div class="modal fade" id="modalKeranjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
                            </div>
                            <div class="modal-body p-0 text-center">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-warning text-white">Nama</span>
                                                </div>
                                                <input type="text" id="nama" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-warning text-white">No Meja</span>
                                                </div>
                                                <input type="number" id="noMeja" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table class="table text-center bg-white" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jml</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelPesanan">
                                        <td colspan="5">Data Kosong</td>
                                    </tbody>
                                </table>

                                <b id="peringatan" class="badge-danger">Silahkan isi Nama dan No Meja</b><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-warning" onclick="prosesTransaksi()" id="simpanTransaksi">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesan Berhasil</h5>
                            </div>
                            <div class="modal-body">
                                Pesanan diterima atas nama <b id="namaPemesan"></b> dengan lokasi meja <b id="lokasiMeja"></b>.
                                <br><br>Pesanan akan segera datang, silahkan menikmati suasana adem di Omah Ingkung Karanganyar. <br><br>
                                <b>Terimakasih</b><br><br>
                                <i>Mohon Tunggu Sebentar</i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Siap</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login admin.</h5>
                            </div>
                            <div class="modal-body">
                                <div id="errorLogin" class="mb-3"></div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <select id="idUser" class="form-control text-dark">
                                            <?php for ($i = 0; $i < count($user); $i++) {
                                                echo "<option value='" . $user[$i]["id"] . "'>" . $user[$i]["nama"] . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white">Password</span>
                                        </div>
                                        <input type="password" id="pass" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="tutupModalLogin()">Batal</button>
                                <button type="button" class="btn btn-warning" onclick="login()" id="simpanTransaksi">Log in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Panel end -->
            </div>
            <!-- body wrapper ends -->
        </div>
    </div>
    <script src="./public/js/jquery/jquery.min.js"></script>
    <script>
        var pesanan = [];
        var ditemukan = false
        var jmlPesanan = 0

        function bukaModalKeranjang() {
            tampilkanPesanan()
            $("#modalKeranjang").modal("show")
            $("#peringatan").hide()
        }

        function bukaModalLogin() {
            $("#modalLogin").modal("show")
        }

        function login() {
            idUser = $("#idUser").val()
            pass = $("#pass").val()

            if ($("#pass").val() == "") {
                $("#pass").focus()
            } else {
                $.ajax({
                    type: 'POST',
                    data: 'idUser=' + idUser + '&pass=' + pass,
                    url: '<?= base_url() ?>/dashboard/auth',
                    dataType: 'json',
                    success: function(data) {
                        if (data == "") {
                            window.location.href = "antrian";
                        } else {
                            $("#errorLogin").html(data)
                        }
                    }
                });
            }
        }

        function prosesTransaksi() {
            var nama = $('#nama').val();
            var noMeja = $('#noMeja').val();
            if (nama == "") {
                $("#nama").focus()
                $("#peringatan").show()
            } else if (noMeja == "") {
                $("#noMeja").focus()
                $("#peringatan").show()
            } else {
                $("#simpanTransaksi").html('i class="mdi mdi-reload fa-pulse"></i> Memproses...')
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/dashboard/tambahPesanan',
                    data: {
                        'pesanan': pesanan,
                        'nama': nama,
                        'noMeja': noMeja
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#modalKeranjang").modal("hide")
                        pesanan = []
                        $('#nama').val("");
                        $('#noMeja').val("");
                        tampilkanPesanan();

                        $("#simpanTransaksi").html('Pesan')
                        $("#namaPemesan").html(nama)
                        $("#lokasiMeja").html(noMeja)
                        $("#modalSelesai").modal("show")
                    }
                });
            }
        }

        function tutupModalKeranjang() {
            $("#modalKeranjang").modal("hide")
        }

        function tutupModalSelesai() {
            $("#modalSelesai").modal("hide")
        }

        function tutupModalLogin() {
            $("#modalLogin").modal("hide")
        }

        function tambahPesanan(id, nama, harga) {
            ditemukan = false
            jmlPesanan = 0
            for (let i = 0; i < pesanan.length; i++) {
                if (pesanan[i][0] == id) {
                    pesanan[i][2] += 1
                    ditemukan = true
                }
                jmlPesanan += pesanan[i][2]
            }
            if (ditemukan == false) {
                pesanan.push([id, nama, 1, harga])
                jmlPesanan += 1
            }

            $("#jmlPesanan").html("(" + jmlPesanan + ")")
        }

        function tampilkanPesanan() {
            var isiPesanan = ""

            for (let i = 0; i < pesanan.length; i++) {
                isiPesanan += "<tr><td>" + pesanan[i][1] + "</td><td>" + pesanan[i][2] + "</td><td>" + formatRupiah(pesanan[i][3].toString()) + "</td><td>" + formatRupiah((pesanan[i][2] * pesanan[i][3]).toString()) + "</td><td><button href='#' class='badge badge-danger' onclick='hapusPesanan(" + i + ")'>x</button></td></tr>"
            }
            if (pesanan.length < 1) {
                $("#simpanTransaksi").prop("disabled", true)
                isiPesanan = "<td colspan='5'>Belum ada pesanan</td>"
            } else {
                $("#simpanTransaksi").prop("disabled", false)
            }

            $("#tabelPesanan").html(isiPesanan)
        }

        function hapusPesanan(id) {
            pesan.splice(id, 1)
            tampilkanPesanan()
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0,sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            //tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <script src="<?= base_url() ?>/public/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url() ?>/public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>/public/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>/public/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>/public/js/template.js"></script>
    <script src="<?= base_url() ?>/public/js/settings.js"></script>
    <script src="<?= base_url() ?>/public/js/todolist.js"></script>
</body>
</html>