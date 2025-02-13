@if (session('success'))
    <script>
        successClick();
    </script>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <script>
        dangerClick();
    </script>
    <button class="btn btn-danger" onclick="dangerClick()">Danger</button>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
