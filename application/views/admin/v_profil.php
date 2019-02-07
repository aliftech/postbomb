<div class="container">
    <?php 

        $email = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('datauser');
        $this->db->where('email', $email);
        $sql = $this->db->get();
        foreach($sql->result_array() as $row)
        {
            $nama = $row['nama'];
            $jenis_kelamin = $row['jenis_kelamin'];
            $hp = $row['hp'];
            $alamat = $row['alamat'];
            $tempat_lhr = $row['tempat_lhr'];
            $tanggal_lhr = $row['tanggal_lhr'];
            $hobi = $row['hobi'];
            $pekerjaan = $row['pekerjaan'];
            $agama = $row['agama'];
            $fp = $row['fp'];
    ?>
    <div class="card">
        <div class="card-header">
            <div class="container"><h5 class="nama"><?= $nama;?></h5></div>
        </div>
        <div class="card-body">
        <div class="text-center">
        <figure class="figure text-center">
                    <img src="<?= base_url('fp/'.$fp);?>" class="figure-img img-fluid rounded text-center" alt="A generic square placeholder image with rounded corners in a figure." width="300" height="300">
                    </figure>
            </div><br>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>Address : <?= $alamat;?></li>
                <li class="list-group-item"><p>Gender : <?= $jenis_kelamin;?></li>
                <li class="list-group-item"><p>Phone Number : <?= $hp;?></li>
                <li class="list-group-item"><p>Place of Birth : <?= $tempat_lhr;?></li>
                <li class="list-group-item"><p>Date of Birth : <?= $tanggal_lhr;?></li>
                <li class="list-group-item"><p>Hobby : <?= $hobi;?></li>
                <li class="list-group-item"><p>Job : <?= $pekerjaan;?></li>
                <li class="list-group-item"><p>Religy : <?= $agama;?></li>
            </ul>
            <a href="<?= base_url()?>main/update"><span class="badge badge-primary">Edit Data Profile</span></a>
            <a href="<?= base_url()?>main/foto"><span class="badge badge-success">Change Photo Profil</span></a>
            <a href="<?= base_url();?>main/pwd"><span class="badge badge-pill badge-danger">Change Password</span></a>
        </div>
        </div>
    </div>
    
</div><br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            Galery
        </div>
        <div class="card-body text-center">
            <?php 
                $this->db->select('*');
                $this->db->from('dataposting');
                $this->db->where('email', $email);
                $sql = $this->db->get();

                foreach($sql->result_array() as $row)
                {
                    $idpost = $row['idpost'];
                    $nmfile = $row['nama_file'];
                    $deskripsi = $row['deskripsi'];
                    $waktu = $row['waktu'];
            ?>

            <ul class="list-group list-group-flush <?= $idpost;?>">
                <li class="list-group-item text-center">
                    <div class="container">
                        <img src="<?= base_url('fp/'.$fp);?>" class="rounded float-left" alt="<?= $fp;?>" width="50" height="50" hspace="5"><p class="mr-auto text-left link"><?=$nama;?></p>
                    </div><br><br>
                <video width="200" height="200" controls preload="none" class="text-center" poster="<?= base_url();?>assets/img/play.png">
                    <source src="<?= base_url('videos/'.$nmfile);?>">
                </video>
                <p class="text-center time"><?= waktu_lalu($waktu);?></p>
                <p class="text-center"><?= $deskripsi;?></p>
                </li>
            </ul>

            <?php
                }
            }
            ?>

        </div>
    </div>
</div>