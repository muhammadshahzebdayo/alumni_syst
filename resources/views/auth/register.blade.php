<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Alumni Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f0f2f5;
            background-image: radial-gradient(#272c33 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            background-attachment: fixed;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-top: 6px solid #272c33;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="max-w-lg w-full">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#272c33] rounded-full shadow-lg mb-4">
                <i class="fa fa-user-plus text-white text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-widest">Join Alumni Network</h2>
            <p class="text-gray-500 text-sm mt-1 font-medium">Create your official academic profile</p>
        </div>

        <div class="register-card rounded-3xl shadow-2xl p-8 transition-all">

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded-lg border border-red-100">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-xs font-bold uppercase mb-2 ml-1 tracking-wider">First
                            Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required autofocus
                                class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition-all"
                                placeholder="John">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-bold uppercase mb-2 ml-1 tracking-wider">Last
                            Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                <i class="fa fa-user-tag"></i>
                            </span>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition-all"
                                placeholder="Doe">
                        </div>
                    </div>
                </div>


                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase mb-2 ml-1">Institutional
                        Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition-all"
                            placeholder="name@university.edu">
                    </div>
                </div>
                {{-- the password field --}}

                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase mb-2 ml-1">Create Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#272c33] focus:border-transparent transition !filter"
                            placeholder="Enter Password">
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full py-4 bg-[#272c33] hover:bg-[#1f2328] text-white font-black rounded-xl shadow-lg transform transition active:scale-95 uppercase tracking-widest">
                            Complete Registration
                        </button>
                    </div>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-gray-600 text-sm">
                Already part of the network?
                <a href="{{ route('login') }}"
                    class="font-bold text-indigo-600 hover:underline decoration-2 underline-offset-4 ml-1">Login
                    here</a>
            </p>
        </div>
    </div>

</body>

</html>
