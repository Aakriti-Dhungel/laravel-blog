<x-app-layout>
    <div class="p-5 my-10 mt-16 overflow-x-hidden">
        <section class="bg-pink-50 py-16 text-center">
            <h2 class="text-4xl font-bold text-pink-600 mb-6">About Digi Nepal</h2>
            <p class="text-gray-700 max-w-2xl mx-auto leading-relaxed">
                Welcome to <span class="font-semibold text-pink-600">Digi Nepal</span> — a digital community passionate about
                technology, learning, and innovation.
                We aim to empower individuals through creative projects, tutorials, and tech insights
                that help bridge the gap between knowledge and real-world development.
            </p>
        </section>

        <section class="py-12 bg-white">
            <div class="container mx-auto px-6 md:px-12 lg:px-20 grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
                        alt="Team collaboration"
                        class="rounded-2xl shadow-lg w-full h-72 object-cover">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-pink-600 mb-4">Our Mission</h3>
                    <p class="text-gray-700 leading-relaxed">
                        At Digi Nepal, we’re building a platform that promotes learning, collaboration, and digital creativity.
                        Whether you're a student, developer, or creator — our goal is to help you learn, grow, and make an impact.
                    </p>
                </div>
            </div>
        </section>

        <section class="bg-pink-100 py-14 text-center">
            <h3 class="text-2xl font-bold text-pink-700 mb-4">Join Our Journey</h3>
            <p class="text-gray-700 max-w-xl mx-auto mb-6">
                Have ideas, skills, or passion for tech?
                Let’s create something meaningful together.
            </p>
            <a href="{{ route('frontend.contact') }}"
                class="inline-block bg-pink-600 text-white px-6 py-3 rounded-full hover:bg-pink-700 transition">
                Contact Us
            </a>
        </section>

        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </div>
</x-app-layout>