@extends('layout.main')
@section('start2')

    <div class="position-absolute top-50 start-50 translate-middle">

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
                        <h3 class="card-title"> Этот бред написал: {{$post->user->name}}</h3>
                        <h5 class="card-title">Название бреда: {{$post->title}}</h5>
                        <p class="card-text">{{$post->text}}</p>
                    </div>
                    <div>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$post->created_at}}</small>
                        <a class="btn btn-sm btn-outline-secondary text-right" href="{{route('postsSport')}}">Назад</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
