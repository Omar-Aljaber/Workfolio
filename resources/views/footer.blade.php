<div class="newsletter-subscription">
    <h4>newsletter subscription</h4>
    
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