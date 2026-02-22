<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Access | Alumni Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f0f2f5;
            background-image: radial-gradient(#272c33 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            background-attachment: fixed;
        }

        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-top: 6px solid #272c33;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-[#272c33] rounded-full shadow-2xl mb-4 text-white">
                <i class="fa fa-key text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-widest">Access Recovery</h2>
            <p class="text-gray-500 text-sm mt-2 font-medium px-4">
                Forgot your password? No problem. We'll send a secure link to your institutional email.
            </p>
        </div>

        <div class="reset-card rounded-3xl shadow-2xl p-8 transition-all">

            @if (session('status'))
                <div
                    class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-medium rounded-r-lg">
                    <i class="fa fa-check-circle mr-2"></i> {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-medium rounded-r-lg">
                    <i class="fa fa-exclamation-triangle mr-2"></i> Whoops! Something went wrong.
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-8">
                    <label class="block text-gray-700 text-xs font-bold uppercase mb-3 ml-1 tracking-wider">Registered
                        Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa fa-envelope-open-text"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition-all outline-none"
                            placeholder="name@university.edu">
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2 ml-1 italic font-medium">Please use the email address
                        associated with your alumni account.</p>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-[#272c33] hover:bg-[#1f2328] text-white font-black rounded-xl shadow-lg shadow-gray-300 transform transition active:scale-95 uppercase tracking-widest text-sm">
                    Send Recovery Link
                </button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('login') }}"
                class="inline-flex items-center text-sm font-bold text-gray-600 hover:text-[#272c33] transition-colors">
                <i class="fa fa-arrow-left mr-2"></i>
                Return to Login Portal
            </a>
        </div>
    </div>

</body>

</html>
