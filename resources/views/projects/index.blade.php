<x-app-layout>
    @section('title', 'projects')
    @section('content')
    <header class="d-flex justify-content-between align-items-center m-4" >
        <div class="h4 text-dark">Projects</div>
        @auth
            <div class="h4 text-dark">
                <a href="/projects/create" class="text-decoration-none title-color">Create New Project</a>
            </div>
        @endauth
    </header>

    <section class="row p-6">
        @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6 col-12 mb-2">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="fw-bold title-color">
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h4>
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
            </div>
        @endforelse
    </section>
    @include('footer')
    @endsection
</x-app-layout>