<?php

class About extends Controller{
    public function index($nama ='Ilyasa',$pekerjaan = 'mahasiswa',$umur =20) {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';

        $this->view('templates/header',$data);

        $this->view('about/index',$data);
        $this->view('templates/footer');

        // echo "Halo,nama saya $nama, saya adalah $pekerjaan";
    }
    public function page()
    {
        # code...
        $data['judul'] = 'Pages';

        $this->view('templates/header',$data);

        $this->view('about/page');
        $this->view('templates/footer');

    }
}
