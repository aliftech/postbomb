<div class="container">

    <?php 
        $email = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('datauser');
        $this->db->where('email', $email);
        $sql = $this->db->get();

        foreach($sql->result_array() as $row)
        {
            $password = $row['password'];
    ?>
    <div class="card">
        <div class="card-header">
            Change Password
        </div>
        <div class="card-body">
        <?php 
            if(validation_errors()) :?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
        <?php endif;?>
        <form action="" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Old Password</label>
                <input type="password" name ="password" class="form-control" id="formGroupExampleInput" value="<?= $password;?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">New Password</label>
                <input type="password" name="pass" class="form-control" id="formGroupExampleInput2" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Confirm Password</label>
                <input type="password" name="konfirmasi" class="form-control" id="formGroupExampleInput2" placeholder="Confirm Password">
            </div>
            <div class="text-center">
                <input type="submit" name="ubah" class="btn btn-primary text-center" value="Change Password">
            </div>
        </form>
        </div>
    </div>
    <?php
        }
    ?>
</div>