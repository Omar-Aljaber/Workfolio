<x-app-layout>
    @section('title', $project->title)
    @section('content')
        <header class="d-sm-flex justify-content-between align-items-center my-5 text-center">
            <h6 class="text-dark">
                <a href="/projects" class="text-decoration-none">Projects</a> / {{ $project->title }}
            </h6>
            <div class="mt-4 mt-sm-0">
                <a href="/projects" class="px-4 px-sm-5">Back</a>
            </div>
        </header>
        <section>
            <div class="card-body">
                <h2 class="fw-bold card-title">{{ $project->title }}</h2>
                <div class="card-text mt-3">{{ $project->description }}</div>
            </div>
        </section>
    @endsection
</x-app-layout>