<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post View
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-800 overflow-hidden shadow-2xl sm:rounded-lg">
                {{--Post Controll Section--}}
                <div class="list-inline">
                    <div class="row">
                        <x-jet-button class="ml-4">
                            <a href="{{route('posts.posts')}}">
                                {{ __('Back') }}
                            </a>
                        </x-jet-button>
                        <x-jet-button class="ml-4">
                            <a href="{{route('posts.edit', $post->id)}}">
                                {{ __('Edit') }}
                            </a>
                        </x-jet-button>
                    </div>
                </div>
                <br>
                {{--Post Info Section--}}
                <div class="bg-gray-800 bg-opacity-90 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-5">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-red-800">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <div class="ml-4 text-lg text-red-800 leading-7 font-semibold"><p>{{$post->title}}</p></div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-red-700">
                                {{$post->body}}
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Writen by {{$post->user->name}} on {{$post->created_at}}.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{--Post Comments Section--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 bg-opacity-90 grid grid-cols-1 md:grid-cols-2">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg text-red-800 leading-7 font-semibold"><p>Comments</p></div>
                    </div>
                    {{-- List of all comments for a post --}}
                    @if(count($post->comments)>0)
                            @foreach($post->comments as $comment)
                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-red-700">
                                        {{$comment->user->name}}:
                                    </div>
                                    <div class="mt-2 text-sm text-red-700">
                                        {{$comment->body}}
                                    </div>
                                    <div class="mt-2 text-sm text-red-700">
                                        {{$comment->updated_at}}
                                    </div>
                                </div>
                            @endforeach
                    @else
                        <div class="ml-4 text-lg text-red-800 leading-7 font-semibold">
                            <p>There are no comments added yet.</p>
                        </div>
                    @endif
                    {{--Write New Comment Form--}}
                    <div class="ml-4 text-lg text-red-800 leading-7 font-semibold">
                        {!! Form::open([
                            'route'     => ['comments.save'],
                            'method'    => 'POST'
                        ]) !!}
                        <div class="form-group">
                            {{ Form::label('title', 'Comment') }}
                            {{ Form::textarea('body', '',[
                                'class'         => 'form-control form-input rounded-md shadow-sm',
                                'id'            => 'article-ckeditor',
                                'placeholder'   => 'I like this Post, because...'
                            ]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('post_id', $post->id,[
                                'class'         => 'form-control',
                                'hidden'        => 'true',
                            ]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('vote', '0',[
                                'class'         => 'form-control',
                                'hidden'        => 'true',
                            ]) }}
                        </div>
                        <div class="form-group">
                            {{-- Submit button --}}
                            <x-jet-button class="ml-4">
                                {{ Form::submit('Submit', [
                                    'class' => 'bg-red-800',
                                ]) }}
                            </x-jet-button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
