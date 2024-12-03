<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        {{-- <ul class="m-5">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="@if(config('app.locale') == $localeCode )text-info @else text-warning @endif ">
                    <a class="btn @if(config('app.locale') == $localeCode )text-info @else text-warning @endif "" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul> --}}
        <form action="{{ route('test.language.store') }}" method="post" class="form-control m-5">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">{{ __('words.name_ar') }}</label>
                    <input type="text" name="name[ar]" id="name" class="form-control @error('name.ar') is-invalid @enderror" placeholder="Add Your category {{ __('words.name') }}"
                        aria-describedby="helpId" value="{{ $category->getTranslation('name','ar') }}">
                            @error('name.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                </div>
                <div class="form-group col-6">
                    <label for="name">{{ __('words.name_en') }}</label>
                    <input type="text" name="name[en]" id="name" class="form-control @error('name.en') is-invalid @enderror" placeholder="Add Your category {{ __('words.name') }}"
                        aria-describedby="helpId" value="{{ $category->getTranslation('name','en') }}">
                        @error('name.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                </div>
                <div class="form-group col-6">
                    <label for="slug">{{ __('words.slug') }}</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Add Your Langauge {{ __('words.slug') }}"
                        aria-describedby="helpId" value="{{ $category->slug }}">
                        @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                </div>
                
            </div>
            <button class="btn btn-success mt-3 mb-3 me-auto"> {{ __('words.create') }}</button>
        </form>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
