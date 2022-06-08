









<?php
session_start();
if(!isset($_SESSION['id']) ){
    header('location:../');
}
$data=$_SESSION['data'];

if($_SESSION['status']==1){
    $status='<b class="text-sucess">Voted</b>';
}else{
    $status='<b class="text-danger"> Not Voted</b>';
}

?><div class="container" id="vform">
        <div class="row" >
            <div class="col ">
                <div class="col">

                    <div class="col">
                        <?php

        if(isset($_SESSION['groups'])){
            $groups=$_SESSION['groups'];
            for($i=0;$i<count($groups);$i++){
                ?>
                        <div class="row text-black">
                            <div class="col">
                                <img src="../uploads/<?php echo $groups[$i]['photo']?>" alt="group image" class="rounded-circle" width="80" height="80" >
                            </div>
                            <div class="col text-black">
                                <strong class="text-black h5">Group
                                    Name:<?php echo $groups[$i]['username']?></strong><br>
                                <strong class="text-black h5">votes:<?php echo $groups[$i]['votes']?></strong><br>
                            </div>
                      
                      <div class="col text-black">
                        <form action="../actions/voting.php" method="post">
                            <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes']?>">
                            <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id']?>">


                            <?php
                    
                    if($_SESSION['status']==1){
                     ?>
                            <p class="text-black text-center"> Already voted</p>
                            <?php
                    }else{
             ?>
                            <button class="btn btn-danger " id="bt"  text-black " type="submit">vote</button>
                            <?php
                }


                ?>



                        </form>
                      </div>
                        <hr>
                        <?php
            }
            }else{
                ?>
                        <div class="container">
                            <p> No Group Selected</p>
                        </div>

                        <?php
            }

            

            ?>



                    </div>
                </div>
            </div>
            <br><br>
            <div class="col">
               

            </div>
        </div>




</div>






<table class="table">

  <thead>
    <tr>
      
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
     <?php

        if(isset($_SESSION['groups'])){
            $groups=$_SESSION['groups'];
            for($i=0;$i<count($groups);$i++){
                ?>
    <tr>
      
      <td><img src="../uploads/<?php echo $groups[$i]['photo']?>" alt="group image" class="rounded-circle" width="80" height="80" ></td>
      <td><strong class="text-black h5">Group
                                    Name:<?php echo $groups[$i]['username']?></strong><br>
                                </td>
    

        


      <td>
           <?php
                    
                    if($_SESSION['status']==1){
                     ?>
                            <p class="text-black text-center"> Already voted</p>
                            <?php
                    }else{
             ?>
                            <button class="btn btn-danger " id="bt"  text-black " type="submit">vote</button>
                            <?php
                }


                ?>



                        </form>
                     
                        <hr>
                        <?php
            }
            }else{
                ?>
                            <p> No Group Selected</p>
                      

                        <?php
            }

            

            ?>



















      </td>
    </tr>
    
  </tbody>
</table>


