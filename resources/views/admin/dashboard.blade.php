<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard!</p>
    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button type="submit">Logout</button>
    </form>
  </div>
</body>

</html>