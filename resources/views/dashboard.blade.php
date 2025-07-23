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

                     
                    @foreach($notes->take(14) as $note)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-success"
                            style="cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#noteModal{{ $note->id }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $note->title }}</h5>
                                    <p class="card-text">{{ substr($note->content,0,30) }}</p>
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
                
                <!-- Display pagination controls -->
                 
                <div class="mt-4">
                    {{ $notes->links() }}
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

                @foreach($notes as $note)
                <div class="modal fade" id="noteModal{{ $note->id }}" tabindex="-1" aria-labelledby="noteModalLabel{{ $note->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="noteModalLabel{{ $note->id }}">{{ $note->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" style="white-space: pre-line; word-break: break-word; overflow-wrap: break-word; max-height:350px; overflow-y:auto;">
                                <p>{{ $note->content }}</p>
                            </div>
                            <div class="modal-footer">
                                <span class="text-muted">{{ $note->created_at?->format('d M Y, H:i') }}</span>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Optionally: Edit/Delete buttons here -->
                                <form action="{{ route('delete', $note->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </slot>
    </x-layout>
</body>
</html>
