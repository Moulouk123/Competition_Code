<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7fafc;
            color: #4a5568;
        }

        .container {
            max-width: 32rem;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            background-color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .heading {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .text {
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .success-message {
            font-size: 1rem;
            font-weight: 600;
            color: #38a169;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1rem;
            font-weight: 600;
            color: #e53e3e;
            margin-bottom: 1rem;
        }

        .form {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #4a5568;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.25rem;
            transition: border-color 0.2s ease-in-out;
        }

        .form-input:focus {
            outline: none;
            border-color: #4299e1;
        }

        .btn {
            background-color: #4299e1;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: #3182ce;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="heading">Forgot your password?</div>

    <div class="text">
        Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
    </div>

    @if (session('status'))
    <div class="success-message">{{ session('status') }}</div>
    @endif

    <div class="error-message">
        <!-- Validation errors go here -->
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="form">
        @csrf

        <label for="email" class="form-label">Email</label>
        <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" placeholder="Put here your Email" required autofocus autocomplete="username" />

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn">Email Password Reset Link</button>
        </div>
    </form>
</div>

</body>
</html>
