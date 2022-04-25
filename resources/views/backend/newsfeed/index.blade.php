<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />


                    {{-- <div class="flex justify-center"> --}}
                      <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        <div class="p-10 mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
                            >{{ __('What\'s on your mind ?') }}</label
                          >
                          <div class="flex flex-row">
                          <x-input id="title" 
                                    class="block mt-1 w-1/2 mt-3 mr-2" 
                                    type="text" 
                                    name="title" 
                                    :value="old('title')"
                                    placeholder="Title"
                                required />

                          <select class="form-select appearance-none mt-3
                                h-12
                                w-1/2
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                name="category_id"
                                required>
                                    <option value="" selected>Select</option>
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @empty
                                        
                                    @endforelse
                            </select>

                          </div>
                          <br>      
                          <textarea
                            class="
                              form-control
                              block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            "
                            id="exampleFormControlTextarea1"
                            rows="3"
                            placeholder="Body"
                            name="body"
                          ></textarea>
                          <x-button class="bg-cyan-700 mt-4">
                            {{ __('Share Status') }}
                        </x-button>
                        </div>
                      </form>
                      {{-- </div> --}}

                    @forelse ($posts as $post)
                    
                    <div class="p-10">
                        <!--Card 1-->
                        <div class=" w-full lg:max-w-full lg:flex">
                          <div class="border border-grey-500 h-48 lg:h-48 lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://picsum.photos/200/300')">
                          </div>
                          <div class="border-r w-full border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                              <p class="text-sm text-gray-600 flex items-center">
                                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                  <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                </svg>
                                Members only
                              </p>
                              <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>
                              <p class="text-gray-700 text-base">{{ $post->body }}</p>
                            </div>
                            @if ($post->comments_count > 0)
                            <h4 class="font-semibold">comments</h4>
                            @forelse ($post->comments as $comment)
                                <div class="flex items-center mt-3">
                                    <img class="w-10 h-10 rounded-full mr-4" src="https://picsum.photos/200/300" alt="Avatar of Writer">
                                    <div class="text-sm">
                                        <p class="text-gray-900 leading-none">{{ $comment->user->name }}</p>
                                        <p class="text-gray-600">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                            <h4 class="font-semibold mt-3">{{ auth()->user()->name }} :</h4>
                            @endif

                            <form method="POST" action="{{ route('comment.store') }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <x-input id="comment" 
                                    class="block mt-1 w-80 mt-3" 
                                    type="text" 
                                    name="comment" 
                                    :value="old('comment')"
                                required />
                                <x-button class="w-20 mt-2">
                                    {{ __('Post') }}
                                </x-button>
                            </form>

                          </div>
                        </div>
                      </div>

                      @empty
                        
                    @endforelse

                    <div class="mt-4">
                      {{ $posts->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
