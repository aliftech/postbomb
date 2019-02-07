<div class="container">
    <?php 
        $email = $this->session->userdata('email');
    ?>
    <div class="card">
        <div class="card-header text-center">
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Search</a>
        <form class="form-inline" action="<?=base_url();?>main/find" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>

        </div>
        <div class="card-body">
            <div class="text-center">
                <a href="<?= base_url();?>main/people" class="badge badge-primary">People</a>
                <a href="<?= base_url();?>main/datapost" class="badge badge-primary">Posting</a>
            </div>
    <?php 
        $this->db->select('*');
        $this->db->from('datauser');
        $this->db->from('dataposting');
        $sql = $this->db->get();
        
        foreach($sql->result_array() as $row)
        {
            $nama = $row['nama'];
            $iduser = $row['iduser'];
            $fp = $row['fp'];
            $nama_file = $row['nama_file'];
            $deskripsi = $row['deskripsi'];
            $idpost = $row['idpost'];
    ?>
        <ul class="list-group list-group-flush <?= $iduser;?><?= $idpost;?>">
            <li class="list-group-item text-center">
                <h5 class="link"><?= $nama;?></h5>
                <form action="<?= base_url();?>main/profile" method="post">
                    <input type="image" src="<?= base_url('fp/'.$fp);?>" width="200" height="200" class="round text-center">
                    <input type="hidden" name="iduser" value="<?= $iduser;?>">
                    <input type="hidden" name="nama" value="<?= $nama;?>">
                </form>
            </li>
            <li class="list-group-item text-center">
                <video controls preload="none" class="text-center round" width="200" height="200" poster="<?= base_url();?>assets/img/play.png">
                    <source src="<?= base_url('videos/'.$nama_file);?>">
                </video>
                <div class="text-center">
                    <p><?= $deskripsi;?></p>
                </div>
            </li>
        </ul>
    <?php
        }
    ?>
        </div>
    </div>

</div>