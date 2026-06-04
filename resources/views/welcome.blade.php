<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-xl text-center max-w-sm">
        <h1 class="text-3xl font-extrabold text-amber-600 tracking-tight mb-2">
            Hello This Is Welcome Page
        </h1>
        <p class="text-gray-600 font-medium">
            Agar yeh text center mein hai, background gray hai, aur heading unique **Amber color** mein hai, toh aapki Tailwind v4 100% chal rahi hai!
        </p>
    </div>

</body>
</html>
