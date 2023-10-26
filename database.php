<?php
class database {
    public $host ="localhost";
    public $uname = "root";
    public $db = "db_akademik";
    public $pass = "root123";
    private $dbCon;

    function __construct() {
        // mysql_connect($this->host,$this->uname,$this->pass);
        // mysql_select_db($this->db);
        $this->dbCon = new mysqli($this->host, $this->uname, $this->pass, $this->db);
        mysqli_select_db($this->dbCon, $this->db);
    }

    function readById($data) {
        $result['id'] = '';
        $result['nama'] = '';
        $result['umur'] = '';
        $result['alamat'] = '';

        if (isset($data['edit'])) {
            $id = $data['edit'];
            $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
            $sql = mysqli_query($this->dbCon, $query);

            $result = mysqli_fetch_assoc($sql);
    
        }
        return $result;
    }

    function read() {
        $query = "SELECT * FROM mahasiswa;";
        $sql = mysqli_query($this->dbCon, $query);

        return $sql;
    }

    function save($data) {

        $nama = $data['nama'];
        $umur = $data['umur'];
        $alamat = $data['alamat'];

        $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$alamat', '$umur')";
        $sql = mysqli_query($this->dbCon, $query);

        return true;
    }

    function edit($data) {

        $id = $data['id'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $alamat = $data['alamat'];

        $query = "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', umur='$umur' WHERE id ='$id';";
        $sql= mysqli_query($this->dbCon, $query);

        return true;
    }

    function delete($dataId) {

        $id = $dataId['delete'];
        $query = "DELETE FROM mahasiswa WHERE id = '$id';";
        $sql = mysqli_query($this->dbCon, $query);

        return true;
    }
}
    
?>