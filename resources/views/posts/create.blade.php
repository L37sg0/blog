<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create new Post
        </h2>
    </x-slot>
    {!! Form::open([
        'route'     => ['posts.save', $userId],
        'method'    => 'POST'
    ]) !!}
    @csrf

    <div class="list-inline">
        <div class="row">
            {{-- Back button --}}
            <a href="{{route('posts.posts')}}" class="list-inline-item btn btn-secondary">Back</a>

            {{-- Submit button --}}
            {{ Form::submit('Save', [
                'class' => 'list-inline-item btn btn-primary',
            ]) }}
        </div>
    </div>

    {{-- Input fields  --}}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '',[
            'class'         => 'form-control',
            'placeholder'   => 'My New Post'
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('title', 'Body') }}
        {{ Form::textarea('body', '',[
            'class'         => 'form-control',
            'id'            => 'article-ckeditor',
            'placeholder'   => 'Hello! This is my new Post.'
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::text('user_id', $userId,[
            'class'         => 'form-control',
            'hidden'       => 'true',
            //'placeholder'   => 'My New Post'
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::text('vote', '0',[
            'class'         => 'form-control',
            'hidden'       => 'true',
            //'placeholder'   => 'My New Post'
        ]) }}
    </div>

    {!! Form::close() !!}
</x-app-layout>
