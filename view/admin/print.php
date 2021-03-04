
<?php

require_once __DIR__ . '../../../vendor/autoload.php';



$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- DataTales Example -->
          <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Pengaduan Masyarakat</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <a href="print.php">pdf</a>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Isi</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                 
                  <tbody>';

                  $out = mysqli_query($koneksi, "SELECT * FROM pengaduan ");
                  while($keluar = mysqli_fetch_array($out)){
                  $html .='<tr>
                  <td>'. $keluar["id_pengaduan"].'</td>
                  <td>'. $keluar["tgl_pengaduan"].'</td>
                  <td>'. $keluar["nik"].'</td>
                  <td>'. $keluar["isi_laporan"].'</td>
                  </tr>';
                  }
                  $html .= '</tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
  
      </div>


</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();