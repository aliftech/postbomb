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
    ?>
        <div class="card">
            <h3 class="card-header">Update Profile Data</h3>
            <div class="card-body">
            <?php 
                if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Name : </label>
                    <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="<?= $nama;?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Email : </label>
                    <input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="<?= $email;?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Address : </label>
                    <input type="text" name="alamat" class="form-control" id="formGroupExampleInput" placeholder="<?= $alamat;?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Phone Number : </label>
                    <input type="number" name="hp" class="form-control" id="formGroupExampleInput" placeholder="<?= $hp;?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Hobby : </label>
                    <input type="text" name="hobi" class="form-control" id="formGroupExampleInput" placeholder="<?= $hobi;?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Job : </label>
                    <input type="text" name="pekerjaan" class="form-control" id="formGroupExampleInput" placeholder="<?= $pekerjaan;?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="edit" class="btn btn-primary" value="Update">
                </div>
            </form>
            </div>
        </div>
    <?php
        }
    ?>
</div> 