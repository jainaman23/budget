<?php

if(!empty($_POST["submit"]))
   {

     //MAKE DIRECTORY
	    $upload_path ="./"."photo_upload"."/".date('M')."./".date('d');
	       if(!is_dir($upload_path)) // Check directory already exist or not.
	         {
 	           mkdir("$upload_path",0777,true);
           }
  }

if($_FILES['photo']['error']==0)
    {

	 //FILE EXTENSION
		$photo_org_name = $_FILES['photo']['name'];
 		$file_extension = explode(".",$photo_org_name);
 		$file_extension = array_pop($file_extension);

if($file_extension=="jpg" || $file_extension=="JPG" || $file_extension=="JPEG"|| $file_extension=="jpeg" || $file_extension=="png" || $file_extension=="PNG") // Check file extension.
  {
	if($_FILES['photo']['size']<51201)
	   {

  //UPLOAD PHOTO
 		   $photo_name = time().rand(1000,9999).".".$file_extension;
 		   $photo_source = $upload_path."/".$photo_name;
	 	   $photo_tmp_name = $_FILES['photo']['tmp_name'];
 	     $move = move_uploaded_file($photo_tmp_name,$photo_source);
 	   }
 	   else
      {
 		    echo "Photo size must be under 50KB";
      }

  }
  else
    {
 	    echo "File extension must be jpeg/png.</br>";
    }
}

?>
