<?php
	function generateRow(){
		$contents = '';
		include_once('config.php');
		$sql = "SELECT * FROM bookings";

		//use for MySQLi OOP
		$query = $conn->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
      <td>".$row['id']."</td>
      <td>".$row['fname']."</td>
      <td>".$row['email']."</td>
      <td>".$row['phone']."</td>
      <td>".$row['age']."</td>
      <td>".$row['gender']."</td>
      <td>".$row['appointment_date']."</td>
      <td>".$row['appointment_time']."</td>
      <td>".$row['remarks']."</td>
 
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
				<th width="12.5%">Name</th>
				<th width="12.5%">Email</th>
				<th width="12.5%">Phone</th> 
        <th width="12.5%">Age</th> 
        <th width="12.5%">Gender</th> 
        <th width="12.5%">Appointment date</th> 
        <th width="12.5%">Appointment Time</th> 
        <th width="12.5%">Additional Comments</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('bookings.pdf', 'I');
?>