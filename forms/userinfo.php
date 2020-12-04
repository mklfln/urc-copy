<?php
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
        $output .= '<div id="home" class="card mb-3 tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      "'.$row['fName'].'"
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      "'.$row['email'].'"
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
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
                        Jaro, Iloilo City, PH
                    </div>
                  </div>
                </div>
              </div>';

              return $output;
        };
?>