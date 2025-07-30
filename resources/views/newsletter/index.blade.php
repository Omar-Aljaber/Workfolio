<x-app-layout>
    @section('title', 'Newsletter')
    @section('content')
    <div class="container">
        <div class="display-6 mb-2">{{__("Send the Newsletter")}}</div>
        <div class="card">
            <div class="card-body">
                <p class="mb-3" style="color: green;">{{__("Active Subscribers")}}: {{ $subscribersCount }}</p>
                <form action="/newsletter/send" name="newsletter" method="POST">
                    @csrf                    
                    <div class="form-group">
                        <label for="subject">{{__("Message Title")}}</label>
                        <input type="text" name="subject" id="subject" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="message">{{__("Message Content")}}</label>
                        <textarea name="message" id="message" rows="10" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        {{__("Send to all Subscribers")}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
