<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Tower Name</label>";  
      }  
      else if(empty($_POST["city"]))  
      {  
           $error = "<label class='text-danger'>Enter city</label>";  
      }  
      else if(empty($_POST["iata_faa"]))  
      {  
           $error = "<label class='text-danger'>Enter DG-Capacity</label>";  
      }  
	  else if(empty($_POST["icao"]))  
      {  
           $error = "<label class='text-danger'>Enter Panel-Capacity</label>";  
      }  
	  else if(empty($_POST["lat"]))  
      {  
           $error = "<label class='text-danger'>Enter Latitude</label>";  
      }  
	  else if(empty($_POST["lng"]))  
      {  
           $error = "<label class='text-danger'>Enter Longitude</label>";  
      }  
	  else if(empty($_POST["alt"]))  
      {  
           $error = "<label class='text-danger'>Enter Altitude</label>";  
      }  
	  else if(empty($_POST["tz"]))  
      {  
           $error = "<label class='text-danger'>Enter Time zone</label>";  
      }  
      else  
      {  
           if(file_exists('test.json'))  
           {  
                $current_data = file_get_contents('test.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'city'          =>     $_POST["city"],  
					 'iata_faa'          =>     $_POST["iata_faa"],  
					 'icao'          =>     $_POST["icao"],  
                     'lat'     =>     $_POST["lat"]  ,
					 'lng'     =>     $_POST["lng"]  ,
					 'alt'     =>     $_POST["alt"]  ,
					  'tz'     =>     $_POST["tz"]  ,
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('test.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Tower data Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Add Tower data</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Append Tower Data to map</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>City</label>  
                     <input type="text" name="city" class="form-control" /><br />  
                     <label>DG-Capacity</label>  
                     <input type="text" name="iata_faa" class="form-control" /><br />  
					 <label>Panel-Capacity</label>  
                     <input type="text" name="icao" class="form-control" /><br />  
					 <label>Latitude</label>  
                     <input type="text" name="lat" class="form-control" /><br />  
					 <label>Longitude</label>  
                     <input type="text" name="lng" class="form-control" /><br /> 
					 <label>Altitude</label>  
                     <input type="text" name="alt" class="form-control" /><br />  
					 <label>Time-Zone</label>  
                     <input type="text" name="tz" class="form-control" /><br />  
                                    
                     <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />       
					                
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>