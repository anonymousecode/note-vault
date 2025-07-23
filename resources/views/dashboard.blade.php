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
                            style="border: 2px dashed green;"
                            data-bs-toggle="modal"
                            data-bs-target="#addNoteModal">
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

                <!-- Add Note Modal -->
                <div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="{{ route('save') }}">
                        @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNoteModalLabel">Add Note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </slot>
    </x-layout>
</body>
</html>
