<x-app-layout>
    @section('title', 'Create New Project - ')
    @section('content')
        <div class="row justify-content-center">
            <div class="col-10 col-xl-7 card p-5 mt-5">
                <h3 class="text-center pb-5 fw-bold">
                    New Project
                </h3>
                <form action="/projects/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Project Title</label>
                        <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" value="{{ $project->title ?? ''}}">
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Project Summary</label>
                        <textarea class="form-control" @error('summary') is-invalid @enderror id="summary" name="summary" cols="30" rows="5">{{ $project->summary ?? ''}}</textarea>
                        @error('summary')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Project Description</label>
                        <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" cols="30" rows="10">{{ $project->description ?? ''}}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary px-4 px-sm-5">Create</button>
                        <!-- <a href="/laravel/myprojects/public/projects" class="btn btn-warning px-4 px-sm-5">Cancel</a> -->
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>