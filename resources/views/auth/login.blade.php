<!-- resources/views/auth/admin-login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container flex items-center h-screen mx-auto">
        <div class="w-full max-w-xs mx-auto">
            <form action="{{ route('admin.login') }}" method="POST"
                class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Email
                    </label>
                    <input
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="email" type="email" name="email" required autofocus>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                        Password
                    </label>
                    <input
                        class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="password" type="password" name="password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        type="submit">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>