@extends('layout.main')
@section('start2')



        <main class="container">

            <div class="col">
                <div class="card ">
                    <img
                        src="https://phonoteka.org/uploads/posts/2021-06/1622512759_25-phonoteka_org-p-drevnyaya-yaponiya-art-krasivo-26.jpg"
                        class="card-img-top"
                        alt="Los Angeles Skyscrapers"
                        height="500"
                    />
                    <div class="card-body">
                        <h3 class="card-title"> Автор: {{$post->user->name}} </h3>
                        <h5 class="card-title"> Название: {{$post->title}}</h5>
                        <p class="card-text">{{$post->text}}</p>
                    </div>
                    <div>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$post->created_at}}</small>
                        <a class="btn btn-sm btn-outline-secondary text-right" href="{{route('posts.index')}}">Назад</a>
                    </div>

                    @foreach($post->comments as $comment)
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                     alt="avatar"
                                     width="60"
                                     height="60"/>
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                    <p class="text-muted small mb-0">{{$comment->created_at}}</p>
                                </div>
                            </div>

                            <p class="mt-3 mb-4 pb-2">{{$comment->text}}</p>
                        </div>

                    @endforeach

                    @guest()
                        <a type="button" href="{{route('login')}}" class="btn btn-light btn-rounded">Для
                            коментирования нужно войти в аккаунт </a>
                    @endguest
                    @auth('web')
                        <form action="{{route('posts.comment')}}" method="post">
                            @csrf
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                         alt="avatar"
                                         width="40"
                                         height="40"/>
                                    <div class="form-outline w-100">
                <textarea name="text" class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                </div>
                            </div>

                        </form>
                    @endauth

                </div

            </div>

        </main>


@endsection
