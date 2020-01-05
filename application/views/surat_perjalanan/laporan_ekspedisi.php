<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Surat Ekspedisi</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>
  <img src="assets/img/corpu.png" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
         The Gade Learning Center Surabaya
          <br>SURABAYA INDONESIA
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p align="center">
    LAPORAN SURAT EKSPEDISI<br>
    <b>Tahun 2019</b>
  </p>
  <table class="table table-bordered text-center">
    <tr class="bg-success">
      <th>No</th>
      <th>Tanggal Pengiriman</th>
      <th>Alamat Pengiriman</th>
      <th>Isi Surat</th>
      <th>No Resi</th>
      <th>Tujuan Penerima</th>
      <th>Kurir</th>
    </tr>
    <?php $no = 1; foreach ($surat_ekspedisi as $row): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['tanggal_pengiriman'] ?></td>
        <td><?= $row['alamat_pengiriman'] ?></td>
        <td><?= $row['isi_surat'] ?></td>
        <td><?= $row['no_resi'] ?></td>
        <td><?= $row['tujuan_pengiriman'] ?></td>
        
        <td>
            <?php foreach($kurir as $k):?>
                <?php if($row['kurir_id'] === $k['id']): ?>
                    <?= $k['nama_kurir'];?>
                <?php endif;?>
            <?php endforeach;?>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

</body>
</html>