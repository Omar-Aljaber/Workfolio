<x-app-layout>
    @section('title', 'projects')
    @section('content')
    <header class="d-flex justify-content-between align-items-center m-4" >
        <div class="h6 text-dark">
            <a href="/projects" class="text-decoration-none">Projects</a>
        </div>
        @if(auth()->user()->name === 'admin')
            <div>
                <a href="/projects/create" class="text-decoration-none">Create New Project</a>
            </div>
        @endif
    </header>

    <section class="row p-6">
        @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6 col-12 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="fw-bold card-title">
                            <a href="/projects/{{ $project->id }}" class="text-decoration-none">{{ $project->title }}</a>
                        </h5>
                        <div class="card-text mt-3">{{$project->summary}}</div>
                    </div>
                    @include('projects.footer')
                </div>
            </div>  
            @empty
            <div class="m-auto align-content-center text-center">
                <div class="alert alert-info text-center">
                    No projects found.
                </div>
                <a href="/projects/create" class="btn btn-primary d-inline-flex align-items-center" role="button">
                    Create New Project Now
                </a>
            </div>
        @endforelse
    </section>
    @include('footer')
    @endsection
</x-app-layout>