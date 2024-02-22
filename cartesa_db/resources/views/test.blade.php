<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test View</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var jsonData = @json($data);
            console.log(jsonData);
        });
    </script>
    <h1>
        test
    </h1>
    <form method="POST" action="{{ route('request.store') }}">
    @csrf

    <!-- Campo email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <!-- Campo nome -->
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>

    <!-- Campo cognome -->
    <label for="surname">Cognome:</label>
    <input type="text" id="surname" name="surname" required>

    <!-- Campo telefono -->
    <label for="telephone">Telefono:</label>
    <input type="tel" id="telephone" name="telephone">

    <!-- Campo città -->
    <label for="city">Città:</label>
    <input type="text" id="city" name="city">

    <!-- Campo CAP -->
    <label for="cap">CAP:</label>
    <input type="text" id="cap" name="cap">

    <!-- Campo descrizione -->
    <label for="description">Descrizione:</label>
    <textarea id="description" name="description" required></textarea>

    <!-- Campo budget -->
    <label for="budget">Budget:</label>
    <input type="number" step="0,01" id="budget" name="budget">

    <!-- Altri campi se necessario -->

    <!-- Pulsante per inviare il form -->
    <button type="submit">Invia</button>
</form>
</body>
</html>
