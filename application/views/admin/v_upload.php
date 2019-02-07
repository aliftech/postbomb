<div class="container">

    <?php
        $email = $this->session->userdata('email');
    ?>

    <div class="card">
            <h5 class="card-header">Upload a Post</h5>
        <div class="card-body">
            <?= $error;?>
            <?php echo form_open_multipart('main/video');?>
                <div class="custom-file text-center">
                    <input type="file" class="custom-file-input text-center" id="validatedCustomFile" name="video">
                    <label class="custom-file-label text-center" for="validatedCustomFile">Choose Video...</label>
                </div>
                <div class="form-group text-center">
                    <textarea name="deskripsi" class="form-control text-center" placeholder="Write a content description..."></textarea>
                </div>
                <div class="text-center">
                    <input type="submit" name="kirim" class="btn btn-primary text-center" value="Publish">
                </div>
            </form>
        </div>
    </div>
</div>