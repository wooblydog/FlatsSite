<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
</head>
<body>
@if(!isset($offer_id))
    <header>
        <div class="container mt-5">
            <nav>
                <ul class="pagination justify-content-center">
                    <div class="apartment-card__button">
                        <a href="/{{$guid}}" class="button button--color-red">
                            <span class="button__text">Перейти к подборкам</span>
                        </a>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
@endif
@php
    $gallery_id = 0;
@endphp
@foreach($offer_items as $offer_item)
    @php
        $gallery_id++;
    @endphp
    <br><br>
    <div class="container washed">
        <div class="apartments">
            <div class="apartment-card">
                <div class="apartment-card__header">
                    <div class="apartment-card__header--left">
                        <div class="apartment-card__name">{{$offer_item->type}} <<{{$offer_item->offer_id}}>>
                            - {{$offer_item->square}} м²
                        </div>
                        <div class="apartment-card__location">{{$offer_item->complex}}</div>
                    </div>
                    <div class="apartment-card__header--right">
                        <div class="apartment-card__price">{{$offer_item->price}} ₽</div>
                    </div>
                </div>
                <div class="apartment-card__body">
                    <div class="gallery" id="gallery{{$gallery_id}}">
                        <div class="gallery__main">
                            <img src="{{asset('storage/images/flats/'.json_decode($offer_item->images)[0])}}"
                                 alt="Image 2">
                        </div>
                        <div class="gallery__thumbnails">
                            @foreach(json_decode($offer_item->images) as $image)
                                <img src="{{asset('storage/images/flats/'.$image)}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="apartment-card__content">
                            <div class="row row--around">
                                <div class="col-12 col-md-7 col-xl-12">
                                    <div class="apartment-card__description">
                                        <div class="collapse-block collapse-block--type-apartment-card">
                                            <div class="collapse-block__content">
                                                <div
                                                    class="collapsing collapsing--type-apartment-card collapsing--color-white">
                                                    <div class="typography">{{$offer_item->description}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-xl-12">
                                    <div class="apartment-card__controls">
                                        <div class="apartment-card__buttons order-1 order-xl-0">
                                            <div class="apartment-card__button">
                                                <a href="#" class="button button--color-red">
                                                    <span class="button__text">Позвонить</span>
                                                </a>
                                            </div>
                                            <div class="apartment-card__button">
                                                <a href="#" class="button button--color-white">
                                                    <span class="button__text">Написать</span>
                                                </a>
                                            </div>
                                            <div class="apartment-card__button">
                                                @if($offer_item->like == true)
                                                    <i class="fa-sharp fa-solid fa-heart fa-2xl"
                                                       style="color: #f88484;"></i>
                                                @endif
                                                @if($offer_item->like == false)
                                                    <i class="fa-sharp fa-regular fa-heart fa-2xl"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endforeach
@if(isset($offer_id))
    @php
        $current_index = array_search($current_guid, $guids);
        $previous_index = $current_index - 1;
        $next_index = $current_index + 1;
        $prev_guid = $guids[$previous_index] ?? null;
        $next_guid = $guids[$next_index] ?? null;
    @endphp
    <footer>
        <div class="container mt-5">
            <nav>
                <ul class="pagination justify-content-center">
                    @if($offer_id == 1)
                        <li class="page-item">
                            <div class="apartment-card__button">
                                <a href="/" class="button button--color-red">
                                    <span class="button__text">На главную</span>
                                </a>
                            </div>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="/{{$next_guid}}">
                                <i class="fa-solid fa-circle-right fa-2xl" style="color: #f88484;"></i>
                            </a>
                        </li>

                    @elseif($offer_id != 1 && $offer_id < $offer_amount)
                        <li class="page-item">
                            <a class="page-link" href="/{{$prev_guid}}" tabindex="-1" aria-disabled="true">
                                <i class="fa-solid fa-circle-right fa-rotate-180 fa-2xl" style="color: #f88484;"></i>
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="/{{$next_guid}}">
                                <i class="fa-solid fa-circle-right fa-2xl" style="color: #f88484;"></i>
                            </a>
                        </li>

                    @elseif($offer_id == $offer_amount)
                        <li class="page-item">
                            <a class="page-link" href="/{{$prev_guid}}" tabindex="-1" aria-disabled="true">
                                <i class="fa-solid fa-circle-right fa-rotate-180 fa-2xl" style="color: #f88484;"></i>
                            </a>
                        </li>

                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                <i class="fa-solid fa-circle-right fa-2xl" style="color: #7c7c7c;"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </footer>
@endif

<script src="https://kit.fontawesome.com/dd5a4462c5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.querySelectorAll('.gallery').forEach(function (gallery) {
        var thumbnails = gallery.querySelectorAll('.gallery__thumbnails img');
        var mainImage = gallery.querySelector('.gallery__main img');

        thumbnails.forEach(function (thumbnail) {
            thumbnail.addEventListener('click', function (event) {
                mainImage.src = this.src;
            });
        });
    });
</script>
</body>
</html>
