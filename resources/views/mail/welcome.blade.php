<html>
<body>
    <p>Good day {{ $user->name }},</p>
    <p>You have been added as an admistrator at {{ config('app.name') }}.</p>
    <p>You can now log in to: {{ config('app.url') }}, by using these credentials:</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>

    <p>Kind regards</p>
    <p>Admin</p>
</body>
</html>