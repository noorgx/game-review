<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Game Reviews</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply bg-white rounded-md px-4 py-2 text-center font-medium text-green-500 shadow-sm ring-1 ring-green-700/10 hover:bg-green-50 h-10;
        }

        .input {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-green-700 leading-tight focus:outline-none rounded-md border-green-300;
        }

        .filter-container {
            @apply mb-4 flex space-x-2 rounded-md bg-green-100 p-2;
        }

        .filter-item {
            @apply flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium text-green-500;
        }

        .filter-item-active {
            @apply bg-white shadow-sm text-green-800 flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium;
        }

        .game-item {
            @apply text-sm rounded-md bg-white p-4 leading-6 text-green-900 shadow-md shadow-black/5 ring-1 ring-green-700/10;
        }

        .game-title {
            @apply text-lg font-semibold text-green-800 hover:text-green-600;
        }

        .game-dis {
            @apply block text-green-600;
        }

        .game-rating {
            @apply text-sm font-medium text-green-700;
        }

        .game-review-count {
            @apply text-xs text-green-500;
        }

        .empty-game-item {
            @apply text-sm rounded-md bg-white py-10 px-4 text-center leading-6 text-green-900 shadow-md shadow-black/5 ring-1 ring-green-700/10;
        }

        .empty-text {
            @apply font-medium text-green-500;
        }

        .reset-link {
            @apply text-green-500 underline;
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl bg-black">
@yield('content')
</body>

</html>
