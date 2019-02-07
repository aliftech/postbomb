<div class="container">

    <?php
        $session = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('datauser');
        $this->db->where('iduser', $data);
        $sql = $this->db->get();

        foreach($sql->result_array() as $row)
        {
            $nama = $row['nama'];
            $jk = $row['jenis_kelamin'];
            $hp = $row['hp'];
            $alamat = $row['alamat'];
            $hobi = $row['hobi'];
            $job = $row['pekerjaan'];
            $fp = $row['fp'];
            $supporter = $row['supporter'];
            $sparam = count(explode(',', $supporter))-1;
            $supporting = $row['supporting'];
            $param = count(explode(',', $supporting))-1;
            $email = $row['email'];
        ?>
    <div class="card">
        <div class="card-header">
            <?= $nama;?>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
            <figure class="figure text-center">
                    <img src="<?= base_url('fp/'.$fp);?>" class="figure-img img-fluid rounded text-center" alt="A generic square placeholder image with rounded corners in a figure." width="300" height="300">
                    </figure>
                <li class="list-group-item">Gender : <?= $jk;?></li>
                <li class="list-group-item">Phone : <?= $hp;?></li>
                <li class="list-group-item">Address : <?= $alamat;?></li>
                <li class="list-group-item">Hobbies : <?= $hobi;?></li>
                <li class="list-group-item">Job : <?= $job;?></li>
                <li class="list-group-item">Supporter : <?= $sparam;?></li>
                <li class="list-group-item">Supporting : <?= $param;?></li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Galery
        </div>
        <div class="card-body">
        <?php 
            $this->db->select('*');
            $this->db->from('dataposting');
            $this->db->where('email', $email);

            $dumb = $this->db->get();

            foreach($dumb->result_array() as $row)
            {
                $nmfile = $row['nama_file'];
                $idpost = $row['idpost'];
                $deskripsi = $row['deskripsi'];
                $waktu = $row['waktu'];
        ?>
            
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item <?= $idpost;?>">
                <div class="container">
                        <img src="<?= base_url('fp/'.$fp);?>" class="rounded float-left" alt="<?= $fp;?>" width="50" height="50" hspace="5"><p class="mr-auto text-left link"><?=$nama;?></p>
                    </div><br><br>
                    <video width="200" height="200" controls preload="none" poster="<?= base_url();?>assets/img/play.png">
                        <source src="<?= base_url('videos/'.$nmfile);?>">
                    </video>
                    <p class="text-center"><?= waktu_lalu($waktu);?></p>
                    <p class="text-center"><?= $deskripsi;?></p>
                </li>
            </ul>
        <?php 
            }
        ?>
        </div>
    </div>
    <?php
        }
    ?>

</div>

