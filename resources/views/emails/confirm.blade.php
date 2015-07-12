
    <title>Sign up Confirmation</title>

    <h1>Thanks fo signing up!</h1>

    <p>
        Click <a href="{{ url("register/confirm/{$user->confirmation_token}") }}">here</a> to confirm your email address!
    </p>