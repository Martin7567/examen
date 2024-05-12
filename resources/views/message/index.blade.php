<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($notifications as $notification)
            Title: {{$notification->title}} <br>
            Text: {{$notification->message}}<br>
            <form action="{{ route('message.destroy', $notification->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijder</button>
            </form>

            <form action="{{ route('message.markAsRead', $notification->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Markeer als gelezen</button>
            </form>
            <br>
        @endforeach
        
        <form action="{{ route('message.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Tekst</label>
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Notificatie maken</button>
        </form>
    </div>
</x-app-layout>