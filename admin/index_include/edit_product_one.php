<?php    
        include('includes/db-connect.php');

       if(!isset($_SESSION['a_email'])){

          echo "<script>window.open('login.php','_self')</script>";
      }else{



			if(isset($_GET['edit_product'])){

				$edit_pro_id=$_GET['edit_product'];

				$edit_product="SELECT * FROM products WHERE p_id='$edit_pro_id'";
				$run_edit=mysqli_query($conn,$edit_product);

				$edit_p=mysqli_fetch_array($run_edit);

      						$pro_id=$edit_p['p_id'];
      						$p_title=$edit_p['p_title'];
      						$p_price=$edit_p['p_price'];
      						$p_img1=$edit_p['p_img1'];
      						///$p_img2=$edit_p['p_img2'];
      						///$p_img3=$edit_p['p_img3'];
      						$p_cat_id=$edit_p['p_cat_id'];
      						$cat_id=$edit_p['cat_id'];
      						$p_date=$edit_p['date'];
      						$p_keyword=$edit_p['p_keyword'];
      						$p_desc=$edit_p['p_description'];
	
			}



 ?>

 <div class="container px-3 ">
            

            <div class=" border mb-5 mb-md-0 center responsive"> <!-- <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">-->
              <div class="py-3">
              <h2 class="h3 mb-0 pt-3 text-center text-black site-section-heading">Insert Product</h2>
             </div>
             <div class="p-3 p-lg-5 ">
         
         <!-- <div class="col-md-">my new-->

          <form action="#" method="POST" enctype="multipart/form-data">


                <div class="form-group row">
                  
                         <div class="col-md-6"> 
                 <label class="text-black h6" >Product Category:</label>  
                      <select name="p_cat" class="form-control">
                      	<option>Select a Product category</option> 
                        <?php 
                            
                             $get_p_cats="SELECT * FROM p_categories" ;
                             $run_p_cats=mysqli_query($conn,$get_p_cats);
                             
                              while( $rows=mysqli_fetch_array($run_p_cats)) {

                              $p_cat_id=$rows['p_cat_id'];
                              $p_cat_title=$rows['p_cat_title'];
                              echo "<option value='$p_cat_id'>$p_cat_title</option>";  

                             }

                          ?>
                       </select>
                     </div>



                <div class="col-md-6">
                  <label class="text-black h6">Categories:</label>
                
                    <select name="cat" class="form-control">
                      <option>Select a Categories</option>
                  
                         <?php   
                             $get_cats="SELECT * FROM categories" ;
                             $run_cats=mysqli_query($conn,$get_cats);
                             
                              while( $rows=mysqli_fetch_array($run_cats)) {

                              $c_id=$rows['cat_id'];
                              $c_title=$rows['cat_title'];
                              echo "<option value='$c_id'>$c_title</option>";  

                             } ?>

                </select>
            </div>


                </div>



                <div class="form-group row">
                   <div class="col-md-6"> 
                     <label  class="text-black h6">Product Title:</label>
                     <input type="text" name="p_title" class="form-control" value="<?php echo $p_title ?>" required="">
                   </div>
                 <div class="col-md-6">
                      <label class="text-black h6">Product Keyword:</label>
                      <input type="text" name="p_keyword" class="form-control" value="<?php echo $p_keyword ?>" required="">
                 </div>
                 
                </div>

              
              <div class="form-group row">
             
              <div class="col-md-6">
                <label class="text-black h6">Product size</label>
                 <select id="c_country" class="form-control" name="size">
                  <option >Product Size</option>    
                  <option value="small">Small</option>    
                  <option value="medium">Medium</option>    
                  <option value="large">Large</option>    
                  <option value="extra_large">Extra Large</option>    
                  <option value="double_xl">XX Large</option>       
                </select>
                </div>

                <div class="col-md-6">
                <label class="text-black h6">Product Price:</label>
                <input type="text" name="p_price" class="form-control" value="<?php echo $p_price ?>" required="">
                </div>   
              </div>  


                    <div class="form-group px-3">
                      <div class="form-group row mb-0">
                        <label class="text-black h6 ">Product Images:</label>
                       </div> 
                    
                     <div class="row border">
                      <div class="col-md-4">
                        <label class="text-black h6"> </label>
                        <input type="file" name="file1" class="form-group">
                        <img class="img-fluid rounded mb-4" src="../admin/index_include/product_images/<?php echo $p_img1 ?>">
                      </div>
                    </div>
                 </div>


               <!---   <div class="form-group row">
                    <div class="col-md-4">
                      <label class="text-black h6">Product Images:</label>
                      <input type="file" name="file1" class="form-control" >
                    </div>
                    <div class="col-md-4">
                      <label class="text-black h6"> </label>
                      <input type="file" name="file2" class="form-control" >
                    </div>
                    <div class="col-md-4">
                      <label class="text-black h6"></label>
                      <input type="file" name="file3" class="form-control" >
                    </div>
                 </div> --->

               <div class="form-group"> 
                <label class="text-black h6">Product Description:</label>
                <textarea name="p_desc" value="<?php echo $p_desc ?>" cols="30" rows="3" class="form-control" placeholder="Write Product Discription here..."></textarea>
              </div>


              <div class="form-group">
                <br>
                <input type="submit" name="update" value="Update Product" class="btn btn-info btn-lg btn-block">
              </div> 
          </form>
     <!--   </div>my new-->
       </div>      
                 
             </div>

          </div><!--- row--- >
         <!---  </div>--->
   



 <?php


          if(isset($_POST['update'])){

             // $c_id=mysqli_real_escape_string($rows['cat_id']);
            //  $p_c_id=mysqli_real_escape_string($rows['p_cat_id']);
              $edit_pro_id=$_GET['edit_product'];
              $p_title=mysqli_real_escape_string($conn,$_POST['p_title']);
              $p_cat=mysqli_real_escape_string($conn,$_POST['p_cat']);
              $cat=mysqli_real_escape_string($conn,$_POST['cat']);
             // $p_sizes=mysqli_real_escape_string($conn,$_POST['size']);
              $p_price=mysqli_real_escape_string($conn,$_POST['p_price']);
              $p_keyword=mysqli_real_escape_string($conn,$_POST['p_keyword']);
              $p_desc=mysqli_real_escape_string($conn,$_POST['p_desc']);


              $file1=$_FILES['file1']['name'];
              ///$file2=$_FILES['file2']['name'];
              ///$file3=$_FILES['file3']['name'];

               // name = store in server 
              $p_img1=$_FILES['file1']['name']; $e_img1=$_FILES['file1']['error'];
              ///$p_img2=$_FILES['file2']['name']; $e_img2=$_FILES['file2']['error'];
              ///$p_img3=$_FILES['file3']['name']; $e_img3=$_FILES['file3']['error'];

              //temprory name = store in server 
              $t_name1=$_FILES['file1']['tmp_name']; $s_img1=$_FILES['file1']['size'];
              ///$t_name2=$_FILES['file2']['tmp_name']; $s_img1=$_FILES['file2']['size'];
              ///$t_name3=$_FILES['file3']['tmp_name']; $s_img1=$_FILES['file3']['size'];


              //explode file name and ext. type
              $f_ext1=explode('.', $p_img1);
              ///$f_ext2=explode('.', $p_img2);
              ///$f_ext3=explode('.', $p_img3);

              //actual file extention
              $f_exta1=strtolower(end($f_ext1));
              ///$f_exta2=strtolower(end($f_ext2));
              ///$f_exta3=strtolower(end($f_ext3));

              //allowed file extention
              $allowed=array('jpg','jpeg','png');

              //condition

              if(in_array($f_exta1, $allowed)){
                //if error conditon
                if ($e_img1===0) {
                  //if($s_img1 < 5000000 && $s_img2 < 5000000 && $s_img3 < 5000000 ){
                        $filenew1=uniqid('',true).".".$f_exta1;
                         $f_destination1='product_images/'.$filenew1;
                         move_uploaded_file($t_name1, $f_destination1);

                       /// $filenew2=uniqid('',true).".".$f_exta2;
                       ///   $f_destination2='product_images/'.$filenew2;
                       ///   move_uploaded_file($t_name2, $f_destination2);
///
                       /// $filenew3=uniqid('',true).".".$f_exta3;
                       ///   $f_destination3='product_images/'.$filenew3;
                       ///   move_uploaded_file($t_name3, $f_destination3);
                            //upload image in folder 
                          echo "Successfully";
                 // }else{echo "<script>alert(This file to Big !)<script>";}
                }else{echo "<script>alert(There was an error  uploading file !)<script>";}

              }else{
                echo "<script>alert(You can not upload this type file !)<script>";
              }

            

              //insert with size-need to add column in database.
         // $insert_p_query="INSERT INTO products(p_cat_id,cat_id,date,p_title,p_img1,p_img2,p_img3,size, p_price,p_keyword,p_description) VALUES('$p_cat','$cat',NOW(),'$p_title','$p_img1','$p_img2','$p_img3','$p_sizes','$p_price','$p_keyword','$p_desc')";

                //insert without sizes
           ///$insert_p_query="UPDATE  products SET p_cat_id='$p_cat',cat_id='$cat',date=NOW(),p_title='$p_title',p_img1='$p_img1',p_img2='$p_img2',p_img3='$p_img3', p_price='$p_price',p_keyword='$p_keyword',p_description='$p_desc') WHERE p_id='$pro_id'"; 

            $insert_p_query="UPDATE products SET p_cat_id='$p_cat',cat_id='$cat',date=NOW(),p_title='$p_title',p_img1='$p_img1',p_price='$p_price',p_keyword='$p_keyword',p_description='$p_desc' WHERE p_id='$edit_pro_id'";
              $run_p_result=mysqli_query($conn,$insert_p_query);

              // image type is different.
              //enctype=multipart/form-data

              



              if($run_p_result){
                echo "<script>alert('product details Updated Successfully !');</script>";
                echo "<script>window.open('index.php?view_product','_self')</script>";
              }else{
                echo "Database Access Failed:".mysqli_error($conn);
              }

              mysqli_free_result($run_p_result);
              mysqli_close($conn);
} 

}
 ?>