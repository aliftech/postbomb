<?php 

    class Sistem extends CI_Model{
        public function registrasi($data)
        {
            $sukses = $this->db->insert('datauser', $data);
            if($sukses)
            {
                return 1;
            } else {
                return 0;
            }
        }
        public function masuk($email, $password)
        {
            $this->db->select('email');
            $this->db->from('datauser');
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $cek = $this->db->get();
            if($cek)
            {
                return 1;
            } else {
                return 0;
            }
        }
        public function edit($data, $email)
        {
            $this->db->where('email', $email);
            $cek = $this->db->update('datauser', $data);
            if($cek)
            {
                return 1;
            } else {
                return 0;
            }
        }
        public function unggah($email, $data)
        {
            $this->db->where('email', $email);
            $sql = $this->db->update('datauser', $data);
        }
        public function password($data, $email)
        {
            $this->db->where('email', $email);
            $ok = $this->db->update('datauser', $data);

            if($ok)
            {
                return 1;
            } else {
                return 0;
            }
        }
        public function uploaded($data)
        {
            $this->db->insert('dataposting', $data);
        }
        public function m_save($id_friend, $session)
        {
            $array = [
                'supporting' => $id_friend
            ];
            $my_array = [
                'supporter' => $myid
            ];
            
            $this->db->where('email', $session);
            $input = $this->db->update('datauser', $array);

            if($input)
            {
                $this->db->where('iduser', $id_friend);
                $insert = $this->db->update('datauser', $my_array);
            }
        }
    }