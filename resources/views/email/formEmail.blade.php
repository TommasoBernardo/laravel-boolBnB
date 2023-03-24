<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Email</title>
</head>
<body>
    <main>
        <h1>
            Nuovo messaggio da parte di un utente 
        </h1>
        <p>
            l'email a cui rispondere è : {{ $lead->email }} ---- nome: {{  $lead->name  }}  ---- Numero telefono: {{  $lead->phone_number  }}
        </p>
        <p>
            messaggio: <br>
           {{ $lead->message }}
        </p>
    </main>
</body>
</html>