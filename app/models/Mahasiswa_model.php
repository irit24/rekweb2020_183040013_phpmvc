<?php

class Mahasiswa_model{

    private $table ='mahasiswa';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
        # code...
    }

    // db handler
    // private $dbh;
    // private $stmt;

    // public function __construct(){
    //     //data source name
    //  $dsn ='mysql:host=localhost;dbname=phpmvc';
    //  try{
    //      $this->dbh = new PDO($dsn,'root','');
    //  }catch(PDOException $e){
    //      die($e->getMessage());
    //  }
    // }
    
        
    
    // // menggunakan array
    // private $mhs = [
    //     [
    //     "jurusan" => "Ilyasa RIdho",
    //     "nrp" => "183040013",
    //     "email"=>"tadzaka.10@gmail.com",
    //     "jurusan" =>"informatika"
    // ],
    // [
    //     "nama" => "Jeremy",
    //     "nrp" => "183040005",
    //     "email"=>"jeremy.10@gmail.com",
    //     "jurusan" =>"informatika"
    // ]
    
    // ];
    // public function getAllMahasiswa(){
    //     // return $this->mhs;
    //     // $this->stmt = $this ->dbh->prepare('SELECT *FROM mahasiswa');
    //     // $this->stmt->execute();
    //     // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);



    // }
    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaByid($id)
    {
        $this->db->query('SELECT * FROM '. $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();

        # code...
    }
    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO  mahasiswa
            VALUES 
            ('',:nama,:nrp,:email,:jurusan)";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nrp', $data['nrp']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->execute();

            return $this->db->rowCount();

        # code...
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    
	public function ubahDataMahasiswa($data)
	{
		$query = "UPDATE mahasiswa SET
					nama = :nama,
					nrp = :nrp,
					email = :email,
					jurusan = :jurusan
				WHERE id = :id";
		
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nrp', $data['nrp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();		

    }
    
  
	public function cariDataMahasiswa()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();
	}	
}