<html>
<head><title>File Insert</title>

<style type="text/css">

</style>

</head>
<body>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<br>Product Name:<input type="text" name="pname" id="pname"/><br>
<br>

<h3>Please Choose a File and click Submit</h3>


<input name="userfile" type="file" />
<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
<br>Product categary:<input type="text" name="pcat" id="pcat"/><br>
<br>Product price:<input type="text" name="pprice" id="pprice"/><br>
<br>Product discount:<input type="text" name="pdisc" id="pdisc"/><br>
<br>Product quantity:<input type="text" name="pquant" id="pquant"/><br>
<br>Product description:<input type="text" name="pdes" id="pdes"/><br>
<input type="submit" value="Submit" /><br>
</form>

<?php


// check if a file was submitted
if(!isset($_FILES['userfile']))
{
    echo '<p>You do naot have selected any file</p>';
}
else
{
    try 
    {
    $msg= upload();  //this will upload your image
    echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e)

    {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}

// the upload function

function upload()
 {
 	include '../database/database.php';
 	$name=$_REQUEST['pname'];
 	$categary=$_REQUEST['pcat'];
 	$price=$_REQUEST['pprice'];
 	$discount=$_REQUEST['pdisc'];
 	$quantity=$_REQUEST['pquant'];
 	$description=$_REQUEST['pdes'];
    //include "file_constants.php";
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) 
    {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) 
        
        {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize)
             {  
  					
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                    // put the image in the db...
                    // database connection
                    //mysql_connect($host, $user, $pass) OR DIE (mysql_error());
                    $link=mysqli_connect($servername, $username, $password)OR DIE (mysqli_error($link));

                    // select the db
                    //mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());
                    mysqli_select_db($link,$dbname)OR DIE ("Unable to select db".mysqli_error($link));
					
                    // our sql query
                    $sql = "INSERT INTO product_details
                    (product_name,product_img,product_category,product_price,product_discount,product_quantity,product_description)
                    VALUES
                    ('$name','{$imgData}','$categary',$price,$discount,$quantity,'$description');";

                    // insert the image
                    //mysql_query($sql) or die("Error in Query: " . mysql_error());
                    mysqli_query($link,$sql) or die("Error in Query: " . mysqli_error($link));
                   
                 
                    $msg='<p>Image successfully saved in database with id ='. mysqli_insert_id($link).' </p>';
            }
             else 
             {
                // if the file is not more than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        
        else
        {
            $msg="File not uploaded successfully.";
        }

    }
    else 
    {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}

// Function to return error message based on error code

function file_upload_error_message($error_code) 
{
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>
</body>
</html>