<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <x-layout>

    <slot>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($notes as $note)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <p class="card-text">{{ $note->content }}</p>
                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</slot>


    </x-layout>
</body>
</html>