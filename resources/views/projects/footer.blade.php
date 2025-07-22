<div class="card-footer border-0 bg-transparent">
    <div class="d-flex text-body-secondery small">
        <div class="d-flex align-items-center me-3">
            <img src="{{ asset('images/clock.svg') }}" alt="">
            <div class="ms-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>