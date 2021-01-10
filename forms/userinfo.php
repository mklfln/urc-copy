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
        $userinfo .= '<div class="row profile-user-info" id="userinfo">
        <div class="col-sm-8">
            <div class="profile-user-details clearfix">
                <div class="profile-user-details-label">
                    First Name
                </div>
                <div class="profile-user-details-value">
                    "'.$row['fname'].'"
                </div>
            </div>
            <div class="profile-user-details clearfix">
                <div class="profile-user-details-label">
                    Last Name
                </div>
                <div class="profile-user-details-value">
                    Doe
                </div>
            </div>
            <div class="profile-user-details clearfix">
                <div class="profile-user-details-label">
                    Address
                </div>
                <div class="profile-user-details-value">
                    10880 Malibu Point,
                    <br> Malibu, Calif., 90265
                </div>
            </div>
            <div class="profile-user-details clearfix">
                <div class="profile-user-details-label">
                    Email
                </div>
                <div class="profile-user-details-value">
                    johndoe@bootdey.com
                </div>
            </div>
            <div class="profile-user-details clearfix">
                <div class="profile-user-details-label">
                    Phone number
                </div>
                <div class="profile-user-details-value">
                    011 223 344 556 677
                </div>
            </div>
        </div>
    </div>';

              return $userinfo;
        };
?>