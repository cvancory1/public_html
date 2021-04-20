<!-- TODO: Make required fields required -->

<!DOCTYPE html>
<html lang = 'en'>
    <header>
        <link rel="stylesheet" href="dat.css" type="text/css" />
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
    </header>

    <body>
        <form name='add_alum' id='add_alum'>    
            <table class='styled-table' id='dynamic_field'>
                <thead>
                        <tr>
                            <th> Alumni ID </th>
                            <th> Birthdate </th>
                            <th> Status </th>
                            <th> Email </th>
                            <th> Phone Number </th>
                            <th> First Name </th>
                            <th> Middle Name </th>
                            <th> Last Name </th>
                            <th> Address </th>
                            <th> Add </th>
                        </tr>
                    </thead>  
                    <tr>  
                        <td><input type='text' name='AlumniID[]' placeholder='Alumni ID' class='form-control AlumniID_list'/></td>
                        <td><input type='text' name='Birthdate[]' placeholder='Birthdate' class='form-control Birthdate_list'/></td>
                        <td><select name='Status[]' class='form-control Status_list'><option value='' disabled selected>Status</option><option value='Active'>Active</option><option value='Retired'>Retired</option></select></td>
                        <td><input type='text' name='Email[]' placeholder='Email' class='form-control Email_list'/></td>
                        <td><input type='text' name='PhoneNumber[]' placeholder='Phone Number' class='form-control PhoneNumber_list'/></td>
                        <td><input type='text' name='FirstName[]' placeholder='First Name' class='form-control FirstName_list'/></td>
                        <td><input type='text' name='MiddleName[]' placeholder='Middle Name' class='form-control MiddleName_list'/></td>
                        <td><input type='text' name='LastName[]' placeholder='Last Name' class='form-control LastName_list'/></td>
                        
                        <td>
                            <select name='Address[]' class='form-control Address_list'>
                                <option value='' disabled selected>Address</option>

                                <?php
                                    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                                        ;
                                    }
                                    else{
                                        print '<p>ERROR: connecting to MySQL.</p>';
                                    }

                                    $query='SELECT * FROM Address';
                                    $r=mysqli_query($connection, $query);
                                    $j = 0;
                                    while($row=mysqli_fetch_array($r)){
                                        echo '<option value=' . $j . '>';
                                        echo $row['streetName'] . ' ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['countryRegion'] . ' ' . $row['zipcode'];
                                        echo '</option>';
                                        $j = $j + 1;
                                    }
                                ?>
                            </select>
                        </td>

                        <td><button type='button' name='add' id='add' class='button'>Add More</button></td>
                    </tr>  
            </table>  
            <input type='button' name='submit' id='submit' class='button' value='Submit' />
        </form>
    </body>

</html>
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append("<tr id='row"+i+"'><td><input type='text' name='AlumniID[]' placeholder='Alumni ID' class='form-control AlumniID_list'/></td><td><input type='text' name='Birthdate[]' placeholder='Birthdate' class='form-control Birthdate_list'/></td><td><select name='Status[]' class='form-control Status_list'><option value='' disabled selected>Status</option><option value='Active'>Active</option><option value='Retired'>Retired</option></select></td><td><input type='text' name='Email[]' placeholder='Email' class='form-control Email_list'/></td><td><input type='text' name='PhoneNumber[]' placeholder='Phone Number' class='form-control PhoneNumber_list'/></td><td><input type='text' name='FirstName[]' placeholder='First Name' class='form-control FirstName_list'/></td><td><input type='text' name='MiddleName[]' placeholder='Middle Name' class='form-control MiddleName_list'/></td><td><input type='text' name='LastName[]' placeholder='Last Name' class='form-control LastName_list'/></td><td><select name='Address[]' class='form-control Address_list'><option value='' disabled selected>Address</option><?php if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){ ; } else{ print '<p>ERROR: connecting to MySQL.</p>'; } $query='SELECT * FROM Address'; $r=mysqli_query($connection, $query); $j = 0; while($row=mysqli_fetch_array($r)){ echo '<option value=' . $j . '>'; echo $row['streetName'] . ' ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['countryRegion'] . ' ' . $row['zipcode']; echo '</option>'; $j = $j + 1; } ?></select></td><td><button type='button' name='remove' id='"+i+"' class='btn btn-danger btn_remove'>X</button></td></tr>");  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"addTest2DataScript.php",
                //url:"weird.php",  
                method:"POST",  
                data:$('#add_alum').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();
                }  
           });  
      });  
 });  
 </script>