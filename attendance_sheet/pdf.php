<?php
include("home.php");
?>
<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "attendance_system");  
      $sql = "SELECT * FROM pdf" ; 
      $result = mysqli_query($conn, $sql); 
	  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>    
	                      <td>'.$row["roll"].'</td>  
                          <td>'.$row["course_name"].'</td>  
                          <td>'.$row["cycle"].'</td>  
                          <td>'.$row["attendance_status"].'</td>  
                          <td>'.$row["date"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 } 
 if(isset($_POST["generate_pdf"]))  
 {  
      
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Student Attendance Sheet Database");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Student Attendance Sheet Database</h4><br /> 
	  <h4>Roll: </h4>
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr> 
               	<th width="15%">roll</th>  
                <th width="25%">course_name</th>  
                <th width="15%">cycle</th>  
                <th width="30%">attendance_status</th>  
                <th width="15%">date</th>  
           </tr>  
      ';  
	   //ob_start(); 
      $content .= fetch_data();
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);
 	  ob_end_clean();
      $obj_pdf->Output('file.pdf', 'I');
	  //delete all the data from pdf database
	  $con = mysqli_connect("localhost", "root", "", "attendance_system");  
      mysqli_query($con,"delete from pdf");
	   
 }   
 ?>  

 <html>  
      <head>  
           
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center">Student Attendance Sheet Database</h4><br />  
                <div class="table-responsive">  
                	<div class="col-md-12" align="left">
					     <h5>
                             <a class="btn btn-info pull-right" href="cal.php">Back</a>
                          </h5>	
                         <form method="post">  
                         <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" /> 
                          					  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr> 
                              	<th width="15%">roll</th>  				  
                               <th width="15%">course Name</th>  
                               <th width="10%">cycle</th>  
                               <th width="30%">attendance status</th>  
                               <th width="10%">date</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();
				     ?>	
                    
                     </table>  
                </div>  
           </div>  
      </body>  
</html>  

