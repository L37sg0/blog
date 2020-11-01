<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Latest Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-800 overflow-hidden shadow-2xl sm:rounded-lg">
                {{-- Button for adding new post --}}
                <x-jet-button class="ml-4">
                    <a href="{{route('posts.new')}}">
                        {{ __('Add New') }}
                    </a>
                </x-jet-button>
                <br>
                <br>
                {{-- List of all posts on page --}}
                <div class="bg-gray-800 bg-opacity-90 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-5">
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                                <div class="flex items-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-red-800">
                                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    <div class="ml-4 text-lg text-red-800 leading-7 font-semibold"><a href="{{route('posts.view',$post->id)}}">{{$post->title}}</a></div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        Writen by {{$post->user->name}} on {{$post->created_at}}. Commented {{count($post->comments)}} times.
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-red-800">
                                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <div class="ml-4 text-lg text-red-800 leading-7 font-semibold"><p>There no Posts added yet</p></div>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- Pagination buttons --}}
                <div class="flex items-left">
                    <div class="p-1 ml-4 text-lg text-red-800 leading-7 font-semibold">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
