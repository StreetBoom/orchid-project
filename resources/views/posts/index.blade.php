@extends('layout.main')

@section('start')

    <main class="container">

        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark" style="background-image: url('https://get.wallhere.com/photo/women-simple-background-arms-up-fitness-model-back-sports-bra-bodybuilding-Sense-muscle-arm-chest-human-body-physical-fitness-wrestler-weight-training-biceps-curl-51935.jpg');>
            <div class=" col-md-6 px-0
        ">
        <h1 class="display-4 fst-italic">Создайте свой пост и покажите его всему миру</h1>
        <p class="lead my-3"></p>

        @auth('web')
            <p class="lead mb-0"><a class="text-white fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Создать пост
                </a></p>
        @endauth
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-black">


                        <form action="{{route('posts.store')}}" method="post">
                            @csrf
                            <div class="mb-3">

                                <label for="exampleFormControlInput1" class="form-label">Название поста</label>
                                <input type="title" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Название вашего поста" name="title">
                            </div>

                            <select class="form-select" aria-label="Пример выбора по умолчанию" name="tag_id">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Текст поста</label>

                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                          name="text"></textarea>
                            </div>

                            <input type="hidden" name="user_id" value="{{$post->user_id}}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create post</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>


        <form action="{{ route('posts.index') }}" method="get">
            <div class="dropdown">
                <select class="btn btn-dark dropdown-toggle" name="tag">
                    <option class="btn btn-dark dropdown-toggle" value="">All categories</option>
                    @foreach ($tags as $tag)
                        <option class="btn btn-dark dropdown-toggle"
                                value="{{ $tag->id }}" {{ $tag->id == request('category') ? 'selected' : '' }}>{{ $tag->title }}</option>
                    @endforeach
                </select>
                <button class="btn btn-dark dropdown-toggle" type="submit">Filter</button>

            </div>
            @foreach($posts as $post)

                <div class="row mb-2">
                    <div class="col-md-10 center">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong
                                    class="d-inline-block mb-2 text-primary text-center">{{$post->tag->title}}</strong>
                                <h3 class="mb-0">{{$post->title}}</h3>

                                <p class="card-text mb-auto">{{$post->text}}</p>
                                <a href="{{route('posts.show',$post->id)}}" class="stretched-link"></a>
                                <div class="mb-1 text-body-secondary">{{$post->created_at}}</div>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250"
                                     xmlns="http://www.w3.org/2000/svg"
                                     role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                     focusable="false"><title>Placeholder</title>

                                    <a>
                                        <img src="{{$post->image}}" alt="как блять" width="200" height="250"/>
                                    </a>

                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        @endforeach

        {{ $posts->links() }}
    </main>
@endsection
