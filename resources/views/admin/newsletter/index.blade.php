<x-app-layout>
    @section('title', 'Newsletter')
    @section('content')
    <div class="container">
        <div class="display-6 mb-2">Send the Newsletter</div>
        <div class="card">
            <div class="card-body">
                <p class="mb-3" style="color: green;">Active Subscribers: {{ $subscribersCount }}</p>
                <form action="/newsletter/send" name="newsletter" method="POST">
                    @csrf                    
                    <div class="form-group">
                        <label for="subject">Message Title</label>
                        <input type="text" name="subject" id="subject" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="message">Message Content</label>
                        <textarea name="message" id="message" rows="10" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        Send to all Subscribers
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
