<!DOCTYPE html>
<html lang="pt-BR" class="bg-zinc-950">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ isset($title) ? "{$title} · Cine" : 'Cine' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Text", "Inter", system-ui, sans-serif;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #09090b;
        }

        ::-webkit-scrollbar-thumb {
            background: #3f3f46;
            border-radius: 999px;
        }
    </style>
</head>

<body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased selection:bg-red-600/40">
    <livewire:web.components.navbar />

    <main>
        {{ $slot }}
    </main>
</body>

</html>
