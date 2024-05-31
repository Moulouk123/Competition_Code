@extends('admin.homeadmin')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Create tag</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">name</label>
                        <div class="control">
                          <input class="input @error('title') is-danger @enderror" type="text" name="nom" value="{{ old('nom') }}" placeholder="tag name ">
                        </div>
                        @error('nom')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">description</label>
                        <div class="control">
                          <input class="input @error('description') is-danger @enderror" type="text" name="description" value="{{ old('description') }}" placeholder="tag description ">
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link"> send </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
