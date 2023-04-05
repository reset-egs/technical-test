<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="module" src="{{ mix('resources/js/app.js') }}" defer></script>
</head>

<body>

    {{-- Main card body --}}
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;" id="app">
        <div class="card rounded border shadow mx-auto w-50">

            {{-- Vue component that is being passed a prop with the list of rooms --}}
            <rooms-component :rooms="{{ json_encode($rooms) }}"></rooms-component>

            {{-- Vue component that shows a message with a status of the reservation --}}
            <message-component :session-data="{{ json_encode(session()->all()) }}"></message-component>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                </div>
                <form method="POST" action="{{ route('reservations.create') }}">
                    @csrf
                    <input type="hidden" name="resource_id" id="resource_id">
                    <div class="modal-body">
                        <!-- Date from input -->
                        <div class="form-outline">
                            <label class="form-label">Date From:</label>
                            <input type="date" class="form-control" name="date_from" />
                        </div>

                        <!--Date to input -->
                        <div class="form-outline">
                            <label class="form-label" for="name">Date To:</label>
                            <input type="date" id="name" class="form-control" name="date_to" />
                        </div>

                        <!-- Number of people input -->
                        <div class="form-outline">
                            <label class="form-label">Number of people</label>
                            <input type="number" class="form-control" name="reserved_people" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

{{-- Helper function to set the right room ID for the reservation modal --}}
<script>
    $(document).ready(function() {
        $('#staticBackdrop').on('show.bs.modal', function(e) {
            var room = JSON.parse(decodeURIComponent($(e.relatedTarget).data('room')));
            $("#resource_id").val(room.id);
            $("#staticBackdropLabel").text("Reserve: " + room.name);
        });
    });
</script>

</html>
