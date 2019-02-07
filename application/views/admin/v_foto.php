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
            $fp = $row['fp'];   
    ?>
        <div class="card">
            <div class="card-header">
                <h5><?= $nama;?></h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                <figure class="figure text-center">
                    <embed src="<?= base_url('fp/'.$fp);?>" class="figure-img img-fluid rounded text-center" alt="A generic square placeholder image with rounded corners in a figure." width="300" height="300">
                    </figure>
                </div>
                            
                <?php
                    }
                ?><br><br>
                <?= $error;?>
                <br>
                    <br>
               <?php echo form_open_multipart('main/do_upload');?>
                <div class="custom-file text-center">
                    <input type="file" name="gambar" class="custom-file-input">
                    <label class="custom-file-label" for="validatedCustomFile">Choose File...</label><br><br>
                    <input type="submit" name="upload" class="btn btn-primary text-center" value="Change Photo">
                </div>
                </form>
            </div>
        </div>


</div>