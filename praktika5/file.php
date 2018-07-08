<?php
if(isset($_POST['submit'])){
	header('Content-Type:text/csv; charset=utf-8');
	header('Content-Disposition: attachment;  filename=info.csv');

	$conn=mysqli_connect("localhost","root","","flot");
	$output=fopen("php://output", "w");
 fputcsv($output, array("ID_psg", "Name"));
	$query="select * from passenger order by ID_psg";
	$result=mysqli_query($conn,$query);
	while($info=mysqli_fetch_assoc($result)){
		// echo "<pre>";
		// print_r($info);
		fputcsv($output, $info);
	}
	fclose($output);
}
else if(isset($_POST['upload'])){
	$conn=mysqli_connect("localhost","root","","flot");
	$filename=$_FILES['file']['name'];
	$arr=explode('.',$filename);
	// print_r($arr);
	if($arr[1]=='csv'){
		$file=$_FILES['file']['tmp_name'];
		$import=fopen($file, 'r');
		while(($data=fgetcsv($import,1000,","))!==FALSE){
			// $data=fgetcsv($import);
			$arr=explode(';', $data[0]);
		/*	$data1=mysqli_real_escape_string($conn,$data[0]);
			$data2=mysqli_real_escape_string($conn,$data[1]);*/
	       $query="insert into passenger(ID_psg,name) Values('$arr[0]','$arr[1]')";
			$result=mysqli_query($conn,$query);
			// print_r($data);
			// print_r($arr);
			// echo $arr[1].'<br>';
		}
		fclose($import);
		echo "upload id done";
	}
	// echo $filename;
}