<!DOCTYPE html>
<html lang="en">
<head>
	<title>Friend_View</title>
	<style type="text/css">
    #friends, #others
    {
        outline: 1px solid black;
    }
    th, td
    {
        outline: 1px solid black;
    }

	</style>
	
</head>
<body>
	
    <h1>Hello, <?= $this->session->userdata['record']['alias'] ?>!</h1>
    <a href="/mains/logout">Logout</a>

    <h3>Here is the list of your friends:</h3>
    <table id="friends">
    <thead>
        <th>Alias</th>
    	<th>Action</th>
    </thead>
    <tbody>
    <?php foreach($friends['friends'] as $friend) { ?>
    <td> <?= $friend['alias'] ?> </td>
    <td>
        <a href="/friends/view_profile/<?= $friend['id'] ?>">View Profile</a>
        <a href="/friends/remove_friend/<?= $friend['id'] ?>">Remove as Friend</a>
    </td>
    </tbody>
    <?php } ?>
    </table>

    <h3>Other Users not on your friend's list:</h3>
    <table id="others">
    <thead>
    	<th>Alias</th>
    	<th>Action</th>
    </thead>
    <tbody>
    
    <?php foreach($friends['others'] as $other) { ?>
    
        <td> <?= $other['alias'] ?> </td>
        <td> <a href="/friends/add_friend/<?= $other['id'] ?>">Add as Friend</a> </td>
    
    </tbody>
    <?php  } ?>
    </table>


</body>
</html>