<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>
    <div id="chat-messages">
        @foreach ($messages as $message)
            <div>
                <strong>{{ $message->user->name }}</strong>: {{ $message->message }}
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.store') }}" method="post">
        @csrf
        <input type="text" name="message" placeholder="Escribe un mensaje">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
