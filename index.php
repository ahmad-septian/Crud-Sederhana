<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
        <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Mahasiswa
        </button>
        <?php
        // Mulai sesi
        session_start();

        // Periksa apakah ada pesan sukses dalam sesi
        if (isset($_SESSION['success'])) {
            $successMessage = $_SESSION['success'];
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo $successMessage;
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';

            // Hapus pesan sukses dari sesi setelah ditampilkan
            unset($_SESSION['success']);
        }
        ?>
        <?php
        // Mulai sesi
        session_start();

        // Periksa apakah ada pesan sukses dalam sesi
        if (isset($_SESSION['delete'])) {
            $successMessage = $_SESSION['delete'];
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo $successMessage;
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';

            // Hapus pesan sukses dari sesi setelah ditampilkan
            unset($_SESSION['delete']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($con, "SELECT * FROM tbl_mahasiswa");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit_mahasiswa/edit.php?id=<?php echo $d['id']; ?>" role="button">EDIT</a>
                            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $d['id']; ?>" role="button">HAPUS</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="needs-validation" method="POST" action="tambah.php" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Field Nama Mahasiswa Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Email Mahasiswa</label>
                            <input type="email" name="email" class="form-control" id="validationCustom02" required>
                            <div class="invalid-feedback">
                                Field Email Mahasiswa Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Password Mahasiswa</label>
                            <input type="password" name="password" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Field Password Mahasiswa Tidak Boleh Kosong
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="liveToastBtn">Save changes</button>
                    </div>
                </div>
            </form>
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