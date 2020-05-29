@extends('layouts.home')

@section('main')

    <h2>{{ $course->title }}</h2>

    @if ($purchased_course)
        Рейтинг: {{ $course->rating }} / 5
        <br />
        <b>Рейтинг курсов:</b>
        <br />
        <form action="{{ route('courses.rating', [$course->id]) }}" method="post">
            {{ csrf_field() }}
            <select name="rating">
                <option value="1">1 - Ужасный</option>
                <option value="2">2 - Не слишком хорошо</option>
                <option value="3">3 - Средне</option>
                <option value="4" selected>4 - Неплохо</option>
                <option value="5">5 - Отлично</option>
            </select>
            <input type="submit" value="Rate" />
        </form>
        <hr />
    @endif

    <p>{{ $course->description }}</p>

    <p>
        @if (\Auth::check())
            @if ($course->students()->where('user_id', \Auth::id())->count() == 0)
            <form action="{{ route('courses.payment') }}" method="POST">
                <input type="hidden" name="course_id" value="{{ $course->id }}" />
                <input type="hidden" name="amount" value="{{ $course->price * 100 }}" />
                <script
                    data-key="{{ env('PUB_STRIPE_API_KEY') }}"
                    data-amount="{{ $course->price * 0 }}"
                    data-currency="usd"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-zip-code="false">
                </script>
                {{ csrf_field() }}
            </form>
            @endif
        @else
            
        @endif
    </p>


    @foreach ($course->publishedLessons as $lesson)
        @if ($lesson->published)@endif {{ $loop->iteration }}.
        <a href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}">{{ $lesson->title }}</a>
        <p>{{ $lesson->short_text }}</p>
        <hr />
    @endforeach

@endsection