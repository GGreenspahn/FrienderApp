<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile_View</title>
    
    <style type="text/css">
        body
        {
            width: 100%;
            height: 100%;
        }
        #home
        {
            float: right;
            margin-right: 8%;

        }
        
        #logout
        {  
            float: right;
            margin-right: 10%;
        }

    </style>
	
</head>
<body>
	
    <h1><?= $profile['info']['alias'] ?>'s Profile</h1>
    <a href="/friends/index" id="home">Home</a>
    <a href="/mains/logout" id="logout">Logout</a>

    <h3>Name: <?= $profile['info']['name'] ?></h3>
    <h3>Email Address: <?= $profile['info']['email'] ?>

</body>
</html>