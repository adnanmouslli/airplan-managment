<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="/addAdmin">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter your name">
    
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email">
    
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Enter your address">
    
        <label for="phone">Phone</label>
        <input type="number" name="phone" placeholder="Enter your phone">
    
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password">
    
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm-password" placeholder="Confirm your password">
    
        <button type="submit">Sign Up</button>
      </form>
</body>
</html>