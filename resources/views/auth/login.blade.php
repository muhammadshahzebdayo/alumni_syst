<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Alumni Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            /* Educational background: subtle pattern + soft blue-grey gradient */
            background-color: #f0f2f5;
            background-image: radial-gradient(#272c33 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            background-attachment: fixed;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-top: 6px solid #272c33;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-[#272c33] rounded-full shadow-2xl mb-4">
                <i class="fa fa-graduation-cap text-white text-4xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-widest">Alumni Login Portal</h2>
            <p class="text-gray-500 font-medium mt-2">Institution Management System</p>
        </div>

        <div class="login-card rounded-3xl shadow-2xl p-8 transition-all hover:shadow-indigo-100/50">

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-1">Official Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition-all"
                            placeholder="username@university.edu">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label class="text-gray-700 text-sm font-bold">Security Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-bold text-indigo-600 hover:text-indigo-800">Forgot?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition-all"
                            placeholder="Enter Password">
                    </div>
                </div>

                <div class="flex items-center mb-6 ml-1">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Keep me logged in</label>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-[#272c33] hover:bg-[#1f2328] text-white font-black rounded-xl shadow-lg shadow-gray-300 transform transition hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
                    Log In
                </button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-gray-600 text-sm">
                Need to register?
                <a href="{{ route('register') }}"
                    class="font-bold text-indigo-600 hover:underline decoration-2 underline-offset-4 ml-1">Create an
                    Alumni Account</a>
            </p>
        </div>
    </div>

</body>

</html>
