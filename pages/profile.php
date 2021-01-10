<?php
include('./db/connection.php');
$userType = $_SESSION['user_type'];

$db = new db();
$userID = $_SESSION['userid'];

$sql = ("SELECT * FROM users JOIN uploads on users.user_id=uploads.user_id WHERE users.user_id = :userID ");
$stmt = $db->connection->prepare($sql);
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);


?>
<div class="container bootstrap snippets bootdeys custom-container">
    <div class="row" id="user-profile">
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="main-box clearfix">
                <h2><?php
               echo $row['fName'];
                ?></h2>
                   <?php
                    if(!empty($_SESSION['loggedin'])){
                        echo '<div class="profile-status">
                         <i class="fa fa-check-circle"></i>Online
                         </div>';
                    }else{
                        echo '<div class="profile-status offline">
                        <i class="fas fa-times-circle"></i>Offline
                        </div>';
                    }
                    ?>
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-img img-responsive center-block">
                <div class="profile-label">
                    <span class="badge badge-danger" ><?php echo $userType
                    ?></span>
                </div>

               <div class="profile-type">
                    <span>Super User</span>
                </div>

                <div class="profile-since">
                    Member since: Jan 2012
                </div>

                <div class="profile-details">
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-tasks"></i>Submissions: <span><?php echo $row['fileName']?></span></li>
                    </ul>
                </div>

                <div class="profile-message-btn center-block text-center">
                    <a href="#" class="btn btn-success">
                        <i class="fa fa-envelope"></i> Send message
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-8">
            <div class="main-box clearfix" id="test">
                <div class="profile-header">
                    <h3><span>User info</span></h3>
                    <a href="#profileForm" class="btn btn-primary edit-profile" id="editProfile" data-toggle="modal" data-target="#modal">
                        <i class="fa fa-pencil-square fa-lg"></i> Edit profile
                    </a>
                </div>

                <div class="row active profile-user-info" id="userinfo">    
                </div>

                <div class="tabs-wrapper profile-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#tab-activity" data-toggle="tab">Activity</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-activity">

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-comment"></i>
                                            </td>
                                            <td>
                                                <?php
                                                $file =array($row['fileName']);

                                                foreach($file as $val){
                                                    echo 'Your file '.$val.' has been submitted';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-truck"></i>
                                            </td>
                                            <td>
                                                John Doe  changed order status from <span class="label label-primary">Pending</span> to <span class="label label-success">Completed</span>
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-check"></i>
                                            </td>
                                            <td>
                                                John Doe  posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-users"></i>
                                            </td>
                                            <td>
                                                John Doe  posted a comment in <a href="#">Avengers Initiative</a> project.
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-heart"></i>
                                            </td>
                                            <td>
                                                John Doe  changed order status from <span class="label label-warning">On Hold</span> to <span class="label label-danger">Disabled</span>
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-check"></i>
                                            </td>
                                            <td>
                                                John Doe  posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-truck"></i>
                                            </td>
                                            <td>
                                                John Doe  changed order status from <span class="label label-primary">Pending</span> to <span class="label label-success">Completed</span>
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <i class="fa fa-users"></i>
                                            </td>
                                            <td>
                                                John Doe  posted a comment in <a href="#">Avengers Initiative</a> project.
                                            </td>
                                            <td>
                                                2014/08/08 12:08
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                       
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modaTitle" aria-hidden="true">
  <div class="modal-dialog modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User info settings</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" id="input-form" role="form">
          <div class="form-group"> 
          <label class="col-md-3 control-label">First name:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="First Name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Last name:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Last Name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Company:</label>
            <div class="col-md-8">
              <input class="form-control" type="text"placeholder="Company">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Email:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Address:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Address">
            </div>
          </div>
         
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="$('#input-form')[0].reset()">Reset</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
  </div>
</div>
  

<div class="container bootstrap snippets bootdey hidden" id="profileForm">
    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      
      <!-- edit form column -->
      


<script>


     $(function(){

$.ajax({
  type: 'POST',
  url: '../include/userinfo.php',
  dataType: 'html',
  success : function(data){
    $('#userinfo').html(data);
  }
  
})
})
</script>
