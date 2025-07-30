<footer class="fixed-bottom bg-white shadow-lg">
    <div class="newsletter-subscription container p-6">
        <h4 class="mb-2">{{__("Newsletter Subscription")}}</h4>
        
        @if(session('newsletter_success'))
            <div class="alert alert-success">
                {{ session('newsletter_success') }}
            </div>
        @endif
        
        @if(session('newsletter_error'))
            <div class="alert alert-danger">
                {{ session('newsletter_error') }}
            </div>
        @endif
        
        <form action="/public/subscribe" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder={{__("Email")}} required>
                <button type="submit" class="btn btn-primary">
                    {{__("Subscribe")}}
                </button>
            </div>
        </form>
    </div>
</footer>

<style>
  main {
    padding-bottom: 100px;
  }
</style>