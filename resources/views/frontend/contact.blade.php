<x-app-layout>
    <div class="p-5 my-10 mt-16 overflow-x-hidden">

        <div class="container mx-auto px-6 lg:px-20">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">
                Contact <span class="text-pink-500">DigiNepal</span>
            </h2>

            @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-8 text-center font-medium">
                {{ session('success') }}
            </div>
            @endif

            <div class="grid md:grid-cols-2 gap-10 bg-white shadow-xl rounded-2xl p-8 lg:p-12">
                <!-- Left: Info -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Get in Touch</h3>
                    <p class="text-gray-600">
                        Have a question or collaboration idea? We’d love to hear from you.
                    </p>

                    <div class="space-y-3">
                        <p class="flex items-center space-x-3">
                            <span class="bg-pink-500 text-white p-2 rounded-full">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <span>Kathmandu, Nepal</span>
                        </p>
                        <p class="flex items-center space-x-3">
                            <span class="bg-pink-500 text-white p-2 rounded-full">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <span>+977 98XXXXXXX</span>
                        </p>
                        <p class="flex items-center space-x-3">
                            <span class="bg-pink-500 text-white p-2 rounded-full">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span>info@diginepal.com</span>
                        </p>
                    </div>

                    <div class="flex space-x-4 pt-4 text-xl">
                        <a href="#" class="hover:text-pink-500"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-pink-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-pink-500"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Right: Form -->
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-pink-500 focus:outline-none">
                        @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-pink-500 focus:outline-none">
                        @error('email') 
                        <p class="text-red-500 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-pink-500 focus:outline-none">
                        @error('subject') 
                        <p class="text-red-500 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" rows="5"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-pink-500 focus:outline-none">{{ old('message') }}</textarea>
                        @error('message') 
                        <p class="text-red-500 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-pink-500 hover:bg-pink-400 text-white font-semibold py-3 rounded-md transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </div>
</x-app-layout>
