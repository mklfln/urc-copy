<?php
    session_start();
    include('../db/connection.php');

    $db = new db();

    $userid = $_SESSION['userid'];
    
        $sql = ("SELECT * FROM users WHERE user_id = :userid");
        $stmt = $db->connection->prepare($sql);
        $stmt->execute(array(
            ':userid' => $userid
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['user_id'] == $userid){
        echo  '<div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      '.$row['fName'].' '.$row['lName'].'
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      '.$row['email'].'
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       
                    </div>
                  </div>
                </div>
              </div>';

        };
?>