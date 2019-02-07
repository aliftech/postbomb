<?php 

    class Main extends CI_Controller{
        public function _construct()
        {
            parent::_construct();
            $this->load->library('form_validation');
            $this->load->model('sistem');
        }
        public function index()
        {
            $this->load->model('sistem');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required');
            $title['title'] = 'Postbomb';
            if($this->form_validation->run() == FALSE)
            {
               
                $this->load->view('templates/header', $title);
                $this->load->view('v_main', $title);
                $this->load->view('templates/footer');
            } else {
                $email = $this->input->post('email', true);
                $password = $this->input->post('password', true);
                $berhasil = $this->sistem->masuk($email, $password);
                if($berhasil == 1)
                {
                    $this->session->set_userdata(array('email' => $email));
                    redirect('main/home');
                } else {
                    redirect('main');
                }
            }
            
        }
        public function daftar()
        {
            $this->load->model('sistem');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('jenis_kelamin','Gender');
            $this->form_validation->set_rules('hp','Phone Numbers','required|numeric');
            $this->form_validation->set_rules('alamat','Address','required');
            $this->form_validation->set_rules('tempat_lhr','Place of Birth','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('hobi','Hobby','required');
            $this->form_validation->set_rules('pekerjaan','Job','required');
            $this->form_validation->set_rules('agama','Religy','required');
            $title['title'] = 'Postbomb:Registration';
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $title);
                $this->load->view('v_daftar', $title);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'hp'=> $this->input->post('hp'),
                    'alamat' => $this->input->post('alamat'),
                    'tempat_lhr' => $this->input->post('tempat_lhr'),
                    'tanggal_lhr' => $this->input->post('tanggal_lhr'),
                    'password' => $this->input->post('password'),
                    'hobi' => $this->input->post('hobi'),
                    'pekerjaan' => $this->input->post('pekerjaan'),
                    'agama' => $this->input->post('agama')
                ];
                $ok = $this->sistem->registrasi($data);
                if($ok == 1)
                {
                    redirect('main/berhasil');
                } else {
                    redirect('main/gagal');
                }
            }
          
        }
        public function berhasil()
        {
            $title['title'] = 'Registration Success';
            $this->load->view('templates/header', $title);
            $this->load->view('v_berhasil');
            $this->load->view('templates/footer');
        }
        public function gagal()
        {
            $title['title'] = 'Registration Fail';
            $this->load->view('templates/header', $title);
            $this->load->view('v_gagal');
            $this->load->view('templates/footer');
        }
        public function home()
        {
            $title['title'] = 'Home';
            $this->load->view('template/header', $title);
            $this->load->view('admin/v_home');
            $this->load->view('template/footer');
        }
        public function profil()
        {
            $email = $this->session->userdata('email');
            $title['title'] = 'Profile';

            //session name
           
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_profil', $email);
                $this->load->view('template/footer'); 
            
        }
        public function update()
        {
            $email = $this->session->userdata('email');
            $this->load->model('sistem');
            $this->load->library('form_validation');
            $title['title'] = 'Update Profile Data';

            //form_validation
            $this->form_validation->set_rules('nama', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('alamat', 'Address', 'required');
            $this->form_validation->set_rules('hp', 'Phone Numbers', 'required|numeric');
            $this->form_validation->set_rules('hobi', 'Hobby', 'required');
            $this->form_validation->set_rules('pekerjaan', 'Job', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_update');
                $this->load->view('template/footer');
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'alamat' => $this->input->post('alamat'),
                    'hp' => $this->input->post('hp'),
                    'hobi' => $this->input->post('hobi'),
                    'pekerjaan' => $this->input->post('pekerjaan')
                ];
                $sukses = $this->sistem->edit($data, $email);
                if($sukses == 1)
                {
                    redirect('main/success');
                } else {
                    redirect('main/fail');
                }
            } 
        }
        public function foto()
        {
            $error = array('error' => '');
            $title['title'] = 'Update Profile Photo';
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_foto', $error);
                $this->load->view('template/footer');
        }
        public function success()
        {
            $title['title'] = 'Success';
            $this->load->view('template/header', $title);
            $this->load->view('alert/sukses');
            $this->load->view('template/footer');
        }
        public function fail()
        {
            $title['title'] = 'Fail';
            $this->load->view('template/header', $title);
            $this->load->view('alert/gagal');
            $this->load->view('template/footer');
        }
        public function do_upload()
        {
            $email = $this->session->userdata('email');
            $this->load->model('sistem');

            //upload foto profil
            $nmfile = $_FILES['gambar']['name'];
            $config = [
                'upload_path' => './fp/',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '2048',
                'overwrite' => TRUE,
                'remove_spaces' => TRUE,
                'file_name' => $nmfile,
            ];
            $this->load->library('upload');
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('gambar'))
            {
                $error = array('error' => $this->upload->display_errors());
                $title['title'] = 'Upload File Error';
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_foto', $error);
                $this->load->view('template/footer');
            } else {
                $data = array('fp' => $this->upload->data('file_name'));
                $this->sistem->unggah($email, $data);
                redirect('main/profil');
            }
        }
        public function pwd()
        {
            $email = $this->session->userdata('email');
            $this->load->library('form_validation');
            $this->load->model('sistem');
            $title['title'] = 'Ganti Password';

            //form validation
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('pass', 'New Password', 'required');
            $this->form_validation->set_rules('konfirmasi', 'Confirm Password', 'required|matches[pass]');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_pwd');
                $this->load->view('template/footer');
            } else {
                $password = md5($this->input->post('password', true));
                $pass = $this->input->post('pass', true);
                $konfirmasi = $this->input->post('konfirmasi', true);
                $data = array('password' => $pass);

                $sukses = $this->sistem->password($data, $email);

                if($sukses == 1)
                {
                    redirect('main/profil');
                } else {
                    redirect('main/fail');
                }
            }
        }
        public function keluar()
        {
            $this->session->sess_destroy();
            redirect('main');
        }
        public function upload()
        {
            $error = array('error' => '');
            $title['title'] = 'Upload Video';
            $this->load->view('template/header', $title);
            $this->load->view('admin/v_upload', $error);
            $this->load->view('template/footer');
        }
        public function video()
        {
            $email = $this->session->userdata('email');
            $this->load->model('sistem');
            $this->load->helper('tgl_indo');
            $this->load->helper('date');

            //upload video
            $nmfile = $_FILES['video']['name'];
            $config = [
                'upload_path' => './videos/',
                'allowed_types' => 'mp4|3gp|mkv|webm|ogg|mp3',
                'overwrite' => TRUE,
                'remove_spaces' => TRUE,
                'max_size' => '204800',
                'file_name' => $nmfile
            ];
            $this->load->library('upload');
            $this->upload->initialize($config);

            if(! $this->upload->do_upload('video'))
            {
                $error = array('error' => $this->upload->display_errors());

                $title['title'] = 'Upload Fail';
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_upload', $error);
                $this->load->view('template/footer');
            } else {
                $datestring = ('%Y-%m-%d %H:%i:%s');
                $time = time();
                $waktu = mdate($datestring, $time);
                $data = [
                    'nama_file' => $this->upload->data('file_name'),
                    'deskripsi' => $this->input->post('deskripsi', true),
                    'waktu' => $waktu,
                    'email' => $email 
                ];
                
                $sukses = $this->sistem->uploaded($data);
                redirect('main/home');
            }
        }
        public function pencarian()
        {
            $title['title'] = 'Search';
            $this->load->view('template/header', $title);
            $this->load->view('admin/v_pencarian');
            $this->load->view('template/footer');
        }
        public function profile()
        {
            $nama = $this->input->post('nama');
            $iduser = $this->input->post('iduser');
            $data['data'] = $iduser;
            $title['title'] = $nama;
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_profile', $data);
                $this->load->view('template/footer');
        }
        public function people()
        {
            $session = $this->session->userdata('email');

            //select data from database
            $this->db->select('*');
            $this->db->from('datauser');
            $this->db->where('email', $session);
            $sql = $this->db->get();

            //foreach result 
            foreach($sql->result_array() as $row)
            {
                $myid['myid'] = $row['iduser'];
        
                $title['title'] = 'People';
                $this->load->view('template/header', $title);
                $this->load->view('admin/v_people', $myid);
                $this->load->view('template/footer');
            }
        }
        public function save()
        {
            $session = $this->session->userdata('email');

            //select data from database
            $this->db->select('*');
            $this->db->from('datauser');
            $this->db->where('email', $session);
            $sql = $this->db->get();

            //foreach result
            foreach($sql->result_array() as $row)
            {
                $myid['myid'] = $row['iduser'];
                $id_friend = $this->input->post('id_friend');
                $this->load->model('sistem');
                $cek = $this->sistem->m_save($id_friend, $session);
                redirect('main/people');
            }
        }
    }