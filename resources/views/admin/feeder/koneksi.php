<?php
function runWS($data,$url, $type = 'json')
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_POST, 1); 

	$headers = array();

	if ($type == 'xml')
	  $headers[] = 'Content-Type: application/xml';
	else
	  $headers[] = 'Content-Type: application/json';

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	if ($data) {
	  if ($type == 'xml') {
		$data = stringXML($data);
	  } else {
		$data = json_encode($data);
	  }
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($ch);
	curl_close($ch);

	return $result;
}

//function feeder
class feeder
{	
	function getToken($username,$password,$url)
	{
		$data = array();
		$data["act"] = "GetToken";
		$data["username"] = "$username";
		$data["password"] = "$password";
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}
	
	function getProfilPT($token,$url)
	{
		$data = array();
		$data["act"]    = "GetProfilPT";
		$data["token"]  = "$token";
		$data["filter"] = "";
		$data["order"]  = "";
		$data["limit"]  = "";
		$data["offset"] = 0;
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}
	
	function getProdi($token,$url)
	{
		$data = array();
		$data["act"]    = "GetProdi";
		$data["token"]  = "$token";
		$data["filter"] = "";
		$data["limit"]  = "";
		$data["offset"] = 0;
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}
	
	function getListMahasiswa($token,$url)
	{
		$data = array();
		$data["act"]    = "GetListMahasiswa";
		$data["token"]  = "$token";
		$data["filter"] = "";
		$data["limit"]  = "";
		$data["offset"] = 0;
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}
	
	function cekMahasiswa($token,$url,$nim)
	{
		$data = array();
		$data["act"]    = "GetListMahasiswa";
		$data["token"]  = "$token";
		$data["filter"] = "nim = '$nim'";
		$data["limit"]  = "";
		$data["offset"] = 0;
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}
	
	function getBiodataMahasiswa($token,$id,$url)
	{
		$data = array();
		$data["act"]    = "GetBiodataMahasiswa";
		$data["token"]  = "$token";
		$data["filter"] = "id_mahasiswa = '$id'";
		$data["limit"]  = "";
		$data["offset"] = "";
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}

	function getBiodataMahasiswa2($token,$url,$semester,$kodejurusan)
	{
		$data = array();
		$data["act"]    = "GetDataLengkapMahasiswaProdi";
		$data["token"]  = "$token";
		$data["filter"] = "id_periode_masuk = '$semester' and id_prodi = '$kodejurusan'";
		$data["limit"]  = "";
		$data["offset"] = "";
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}	

	function getBiodataMahasiswaSemua($token,$url,$semester)
	{
		$data = array();
		$data["act"]    = "GetDataLengkapMahasiswaProdi";
		$data["token"]  = "$token";
		$data["filter"] = "id_periode_masuk = '$semester'";
		$data["limit"]  = "";
		$data["offset"] = "";
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}
	
	function GetDataLengkapMahasiswaProdi($token,$id,$url)
	{
		$data = array();
		$data["act"]    = "GetDataLengkapMahasiswaProdi";
		$data["token"]  = "$token";
		$data["filter"] = "id_mahasiswa = '$id'";
		$data["limit"]  = "";
		$data["offset"] = "";
		$hasil = runWS($data,$url,'json');
		return $hasil;
	}

}
?>