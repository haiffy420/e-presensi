<?php
if(isset($_GET['kode'])){
            $sql_hapus = 
            "DELETE tb_kegiatan FROM tb_kegiatan
            WHERE tb_kegiatan.id_kegiatan='" . $_GET['kode'] . "'";

            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            // $sql_hapus1 = 
            // "DELETE tb_iadl_lawton,tb_kegiatan FROM tb_iadl_lawton
            // INNER JOIN tb_kegiatan ON tb_kegiatan.id_kegiatan = tb_iadl_lawton.id_kegiatan
            // WHERE tb_iadl_lawton.id_kegiatan='" . $_GET['kode'] . "'";

            // $query_hapus = mysqli_query($koneksi, $sql_hapus1);

            // $sql_hapus2 = 
            // "DELETE tb_adl_barthel,tb_kegiatan FROM tb_adl_barthel
            // INNER JOIN tb_kegiatan ON tb_kegiatan.id_kegiatan = tb_adl_barthel.id_kegiatan
            // WHERE tb_adl_barthel.id_kegiatan='" . $_GET['kode'] . "'";

            // $query_hapus = mysqli_query($koneksi, $sql_hapus2);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-kegiatan';
                    }
                })</script>";
                }else{
                echo trigger_error("Query Failed! SQL: $sql_ubah_p - Error: ".mysqli_error($koneksi), E_USER_ERROR);
                // "<script>
                // Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                // }).then((result) => {
                //     if (result.value) {
                //         window.location = 'index.php?page=data-kegiatan';
                //     }
                // })</script>";
            }
        }

