<?php
session_start();
if(!$_SESSION['email']){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION["email"]; ?>!</h2>
    <button onclick="clearSession()">logout</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        function clearSession(){
            window.location.href = 'logout.php';
        }

        setInterval(function(){
            $.ajax({
                url: 'checkMultiUser.php',
                type: 'POST',
                success: function(response){
                    let r = JSON.parse(response);
                    if(r['status'] != 'ok'){
                        window.location.href = "logout.php"
                    }
                }, error: function(){

                }
            })
        }, 15000)
    </script>
</body>
</html>