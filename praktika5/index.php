<?php
 $conn=mysqli_connect("localhost","root","","flot");
 if(!$conn){
    echo "error with connect";
 }
 $query="select * from passenger order by ID_psg";
 $res=mysqli_query($conn,$query);
 $result=mysqli_fetch_all($res,MYSQLI_ASSOC);
 // print_r($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>passenger page</title>
</head>
<body>
	<form method="post" action="file.php" enctype="multipart/form-data">
		<input type="submit" name="submit" value="send">
		<input type="file" name="file">
		<input type="submit" name="upload" value="Upload">
	</form>
	<table border="1" cellpadding="40">
		<tr>
			<th>ID_psg</th>
			<th>Name</th>
		</tr>
		<?php
		   foreach ($result as  $value) {
		   	$id=$value['ID_psg'];
		   	$name=$value['name'];
		   	echo "<tr><td>$id</td><td>$name</td></tr>";
		   }
		 ?>
		<!--  <tr>
		 	<td><?php $value['ID_psg']?></td>
		 	<td><?php $value['name']?></td>
		 </tr> -->
		
	</table>
</body>
</html>


<?php
// header('Content-type: application/ms-excel');
// header("Content-Disposition: attachment; filename=file.csv");
// $str='aaa,bbb,ccc';
// $fp=fopen("data.csv", "w");
// $arr=explode(',', $str);
// print_r($arr);
// fputcsv($fp, $arr);
// fclose($fp);
// (
// "Peter,Griffin,Oslo,Norway",
// "Glenn,Quagmire,Oslo,Norway",
// );

// $fp=fopen('data.csv','w');

// foreach ($list as $line)
//   {
//   	$b=explode(',',$line);
//   	// print_r($b);
//   fputcsv($fp,$b);
//   }

// fclose($fp);$list = array

