<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create an Event</h1>
    <form method="post" action="">
        <div>
        <label>Name: </label>
        <input type="text" name="name" placeholder="Name" />
        </div>
        <div>
        <label>Description: </label>
        <input type="text" name="description" placeholder="Description"/>
        </div>
        <div>
        <label>Date: </label>
        <input type="datetime-local" name="event_time" placeholder="Date"/>
        </div>
        <input type="submit" value="Save an Event"/>
    </form>
</body>
</html>