<?php 
        

       if(!isset($_SESSION['a_email'])){

          echo "<script>window.open('login.php','_self')</script>";
      }else{

?>

	
		
		 <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"> <a href="index.php?dashboard"><span class="icon-dashboard"></span> Dashboard</a> <span class="mx-2 mb-0">/</span> <a href="index.php?insert_p_cat"><strong class="text-black">Insert product categories</strong></a></div>
        </div>
      </div>
    </div>

     
          <div class="row px-3 py-3">
            <div class=" col-md-12 border mb-5 mb-md-0 center responsive "> <!-- <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">-->
              <div class=" py-3">
              <h2 class="h3 mb-0 pt-3 text-center text-black site-section-heading">Insert Product Categories</h2>
             </div>
             <div class="p-3 p-lg-5 ">
         
         <!-- <div class="col-md-">my new-->
         	<div class="col-md-12 "> 
               <form action="" method="POST" enctype="multipart/form-data">

          			
                <div class="form-group row">
                	
               

                       <div class="col-md-12"> 
                      <label class="text-black h6" >Insert Product Title:</label>  
                      <input type="text" name="p_cat_title" class="form-control">

                     </div>

                </div>



                <div class="form-group row">
                   <div class="col-md-12"> 
                     <label  class="text-black h6">Product Categories Discription:</label>
                     <input type="text" name="p_cat_desc" class="form-control" required="">
                   </div>
                </div>    

              <div class="form-group col-md-12 ">
                <br>
                <input type="submit" name="submit" value="Insert" class="btn btn-info btn-lg btn-block">
              </div> 

          </form>
     <!--   </div>my new-->
     </div>
       </div>      
                 
             </div>

          </div><!--- row--- >
         <!---  </div>--->
  
<?php 
          if(isset($_POST['submit'])){

          echo $p_cat_title=$_POST['p_cat_title'];
          echo $p_cat_desc=$_POST['p_cat_desc'];

          $insert_p_cat="INSERT INTO p_categories(p_cat_title, p_cat_desc) VALUES('$p_cat_title','$p_cat_desc')";
          $run_p_cat=mysqli_query($conn, $insert_p_cat);
          
          echo "run";
            if($run_p_cat){
              echo "run";
          echo "<script>alert(Product Category Inserted Successfully !)</script>";
          echo "<script>window.open('index.php?view_p_cat','_self')</script>";
           }

}

 ?>        





      	<?php } ?>


