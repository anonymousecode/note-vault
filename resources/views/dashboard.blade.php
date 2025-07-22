<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS if not already in your x-layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <x-layout>
        <slot>
            <div class="container mt-4">
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <!-- input button -->
                     <div class="col">
                        <button type="button"
                            class="card h-100 shadow-sm add-button w-100 d-flex align-items-center justify-content-center"
                            style="border: 2px dashed green;">
                            <h5 class="card-title mb-0 text-success">+ Add Note</h5>
                        </button>
                    </div>

                     
                    @foreach($notes->take(19) as $note)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-success">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $note->title }}</h5>
                                    <p class="card-text">{{ $note->content }}</p>
                                </div>
                                <div class="card-footer text-muted text-end">
                                    <small>
                                        {{ $note->created_at?->format('d M Y') }}
                                    </small>
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
