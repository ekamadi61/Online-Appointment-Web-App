<?php
	function generateRow(){
		$contents = '';
		include_once('config.php');
		$sql = "SELECT * FROM patients";

		//use for MySQLi OOP
		$query = $conn->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
      <td>".$row['id']."</td>
      <td>".$row['username']."</td>
      <td>".$row['contact']."</td>
      <td>".$row['address']."</td>
      <td>".$row['date']."</td>
      <td>".$row['bloodgroup']."</td>
      <td>".$row['age']."</td>
      <td>".$row['gender']."</td>
      <td>".$row['temperature']."</td>
      <td>".$row['weight']."</td>
      <td>".$row['symptoms']."</td>
      <td>".$row['diagnosis']."</td>
      <td>".$row['prescription']."</td>
 
			</tr>
			";
		}
		////////////////

		//use for MySQLi Procedural
		// $query = mysqli_query($conn, $sql);
		// while($row = mysqli_fetch_assoc($query)){
		// 	$contents .= "
		// 	<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['firstname']."</td>
		// 		<td>".$row['lastname']."</td>
		// 		<td>".$row['address']."</td>
		// 	</tr>
		// 	";
		// }
		////////////////
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
        <img src="#">
      	<h2 align="center">Doc Zone Online Appointments</h2>
      	<h4>Bookings</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">ID</th>
				<th width="7.6%">Name</th>
				<th width="7.6%">Contact</th>
				<th width="7.6%">Address</th> 
        <th width="7.6%">Date Visited</th> 
        <th width="7.6%">Blood Group</th> 
        <th width="7.6%">Age</th> 
        <th width="7.6%">Gender</th> 
        <th width="7.6%">Temperature</th> 
        <th width="7.6%">Weight</th> 
        <th width="7.6%">Symptoms</th> 
        <th width="7.6%">Diagnosis</th> 
        <th width="7.6%">Prescription</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('records.pdf', 'I');
	

?>