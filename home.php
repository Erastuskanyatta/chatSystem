
<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

session_start();
require_once('./connect.php');
include_once('./conversation.php');
   


if(isset($_SESSION['name'])){

    // $user = getUser($_SESSION['name'], $conn);
    $name = $_SESSION['name'];
    $uid = $_SESSION['UId'];
    // $user = getUser($_SESSION['name'], $conn);
    $conversations = getConversation($uid, $conn); 
    //  print_r($conversations);

    // $sql = mysqli_query($conn,"SELECT * FROM user_validation where name != '$name'");
    // $users = mysqli_fetch_all($sql,MYSQLI_ASSOC);
   

?> 
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/home.css" type="text/css">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="d-flex  
justify-content-center align-items-center vh-100">
<div class="p-2 w-400 rounded shadow"  >
    <div>
        <div class="d-flex
                     mb-3 p-2 
                    bg-light
                    justify-content-between
                    aligh-items-center">
            <div class="d-flex
                         align-items-center">
                         <img src="img/uploads/1.png" class="w-25 rounded-circle">
                         <h3 class="fs-xs m-2"><?php echo $_SESSION['name'];?></h3>
             </div>
            <a href="logout.php" class="btn " id="button" > Logout</a>
        </div>
        <div class="input-group mb-3">
            <input type="text" 
            placeholder="Search..." 
            class="form-control">
            <!-- <button class="btn btn-secondary">
                <i class="fa fa-search"></i>
            </button> -->
        </div>
        <ul class="list-group mvh-50 overflow-auto">
            <?php if(empty($conversations)) { ?> 
                   
            <li class="list-group-item">
                <a href="chat.php"
                class="d-flex 
                        justify-content p-2">
                <div class="d-flex
                            align-items-center">
                    <img class="w-10  rounded-circle" src="img/uploads/1.png" alt="" srcset="">        
                 
                    <h3 class="fs-xs m-2"> <?php echo $name = $_SESSION['name'];?></h3>
                </div>              
                </a>
            </li>
            <?php } else{ ?>
                <div class="alert alert-info text-center">
                    <i class="fa fa-comments d-block fs-big"></i>
                    No Message yet, Start over.
                </div>
            <?php } ?>
        </ul> 
    </div>
</div>
   //styling starts here. Please proceed.
<style>
    .w-10 {
        width: 30px;
        
    }
.btn {
    background-color: gray;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
h3 {
   
    font-size: 120px;
}

</style>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}




  
