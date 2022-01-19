<?php 

include_once "db.php";
session_start();

if(isset($_SESSION["unique_id"])){
    
    $outgoing_id = mysqli_real_escape_string($conn, $_POST["outgoing_id"]);
    $incoming_id = mysqli_real_escape_string($conn, $_POST["incoming_id"]);
    $output = "";

    $sql = "SELECT * FROM messages
            LEFT JOIN users On users.unique_id = messages.outgoing_message_id
            WHERE(outgoing_message_id = {$outgoing_id} AND incoming_message_id = {$incoming_id})
            OR (outgoing_message_id = {$incoming_id} AND incoming_message_id = {$outgoing_id}) ORDER BY msg_id";

    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row["outgoing_message_id"] === $outgoing_id){ //if sender
                $output .= '<div class="chat outgoing">
                            <div class="details">
                            <p>' .$row['msg']. '</p>
                            </div>
                            </div>';
            }else{//receiver
                $output .= '<div class="chat incoming">
                            <img src="profile_images/'.$row['img'].'" alt="">
                            <div class="details">
                            <p>' .$row['msg']. '</p>
                            </div>
                            </div>';
            }
        }
        echo $output;
    }        

}else{
    header("location: login.php");
}
