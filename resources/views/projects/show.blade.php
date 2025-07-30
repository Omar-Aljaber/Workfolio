<x-app-layout>
    @section('title', $project->title)
    @section('content')
        <header class="container d-sm-flex justify-content-between align-items-center my-5 text-center">
            <h6 class="text-dark">
                <a href="/public/projects" class="text-decoration-none title-color">{{__("Projects")}}</a> / {{ $project->title }}
            </h6>
            <div class="mt-4 mt-sm-0">
                <a href="/public/projects" class="px-4 px-sm-5 title-color">{{__("Back")}}</a>
            </div>
        </header>
        <section class="container">
            <div class="card-body">
                <h2 class="fw-bold">{{ $project->title }}</h2>
                <div class="card-text mt-3">{{ $project->description }}</div>
            </div>
        </section>
    @endsection
</x-app-layout>