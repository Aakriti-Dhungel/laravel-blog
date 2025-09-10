<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiNepal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header>
        <x-frontend-navbar />


    </header>

    <main>
        <!-- Main content slot for dynamic content -->
        {{ $slot }}
    </main>

    <footer>
        <p class=" text-center">&copy; {{ date('Y') }} DigiNepal Blog</p>
    </footer>

</body>

</html>