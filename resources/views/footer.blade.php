

<footer class="fixed-bottom bg-white shadow-lg">
    <div class="newsletter-subscription container p-6">
        <h4 class="mb-2">Newsletter subscription</h4>
        
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
        
        <form action="/subscribe" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" class="form-control" 
                    placeholder="Email" required>
                <button type="submit" class="btn btn-primary">
                    Subscribe
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