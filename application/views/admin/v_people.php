<div class="container">

    <?php 
        $email = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('datauser');
        $this->db->where('email', $email);
        $data = $this->db->get();

        //foreach data
        foreach($data->result_array() as $obj)
        {
            $supporting = $obj['supporting'];
        
    ?>     
     <div class="card">
        <div class="card-header text-center">
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Search People</a>
        <form class="form-inline" action="<?=base_url();?>main/find" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>

        </div>
        <div class="card-body">
        <?php
       
       $this->db->select('*');
       $this->db->from('datauser');
       $this->db->where('email !=', $email);
       $sql = $this->db->get();

       foreach($sql->result_array() as $row)
       {
           $iduser = $row['iduser'];
           $nama = $row['nama'];
           $fp = $row['fp'];
           
       
   ?>
  <ul class="list-group list-group-flush text-center<?= $iduser;?>">
               <li class="list-group-item text-center">
                   <h5 class="link text-center"><?= $nama;?></h5>
                   <figure class="figure text-center">
                   <form action="<?= base_url();?>main/profile" method="post">
                       <input type="image" src="<?= base_url('fp/'.$fp);?>" class="figure-img img-fluid rounded text-center" alt="<?= $fp;?>" width="300" height="300">
                       <input type="hidden" name="iduser" value="<?= $iduser;?>">
                   </form>
                   </figure>
        <?php
           $array_supporting = explode(',', $supporting);
           if(in_array($iduser, $array_supporting, TRUE))
           {
       ?>
       <span class="text-center">
           <form action="<?= base_url();?>main/delete" method="post">
               <input type="hidden" name="id_friend" value="<?= $iduser;?>">
               <button type="submit" class="btn btn-success text-center">Supported</button>
           </form>
       </span>
       <?php
           } else {
       ?>
       <span class="text-center">
           <form action="<?= base_url();?>main/save" method="post">
               <input type="hidden" name="id_friend" value="<?= $iduser;?>">
               <button type="submit" class="btn btn-primary text-center">Support</button>
           </form>
       </span>
       <?php 
           }
       ?>
               </li>
           </ul>
   </div>
   <?php
       }
    }
   ?>
        </div>
    </div>
</div>