<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .hero {
        background-color: #333;
        width: 100%;
        padding: 20px;
    }
</style>

<body>
    <div class="hero">
        <h3 class="text-white text-center">Membuat CRUD Dengan PHP Dan MYSQL</h3>
        <p class="text-white text-center">Menampilkan data dari Database</p>
    </div>
    <div style="padding:10px">

        <!-- Button trigger modal -->
        <a href="../index.php" type="button" class="btn btn-secondary my-3">
            <i class="fa-solid fa-arrow-left"></i> Back To Home </a>

        <?php
        include '../koneksi.php';

        // Periksa apakah $_GET['id'] memiliki nilai
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($con, "SELECT * FROM tbl_mahasiswa WHERE id='$id'");
            $nomor = 1;

            // Pastikan ada data yang ditemukan
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_array($result);
        ?>
                <!-- Form input -->
                <form class="needs-validation" method="POST" action="./prosesEdit.php" novalidate>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Nama Mahasiswa</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01" value="<?php echo $data['name'] ?>" required>
                        <div class="invalid-feedback">
                            Field Nama Mahasiswa Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">Email Mahasiswa</label>
                        <input type="email" name="email" class="form-control" id="validationCustom02" value="<?php echo $data['email'] ?>" required>
                        <div class="invalid-feedback">
                            Field Email Mahasiswa Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Password Mahasiswa</label>
                        <input type="password" name="password" class="form-control" id="validationCustom03">
                        <!-- <div class="invalid-feedback">
                            Field Password Mahasiswa Tidak Boleh Kosong
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-primary my-3" id="liveToastBtn">Save changes</button>
                </form>
        <?php
            } else {
                echo "Data tidak ditemukan."; // Pesan jika data tidak ditemukan
            }
        } else {
            echo "ID tidak ditemukan."; // Pesan jika ID tidak ditemukan
        }
        ?>


    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })

        // Example starter JavaScript for disabling form submissions if there are invalid fields
    </script>
    <script>
        // Dapatkan form
        var form = document.querySelector('.needs-validation');
        // Tambahkan event listener ke tombol "Save changes"
        form.addEventListener('submit', function(event) {
            // Cek validasi form
            if (!form.checkValidity()) {
                event.preventDefault(); // Mencegah pengiriman form jika tidak valid
                event.stopPropagation(); // Mencegah penyebaran event ke elemen lain

                // Tampilkan pesan validasi
                form.classList.add('was-validated');
            }
        });

        function showToast() {
            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')

            if (toastTrigger) {
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastTrigger.addEventListener('click', () => {
                    toastBootstrap.show()
                })
            }
        }
    </script>

</body>

</html>