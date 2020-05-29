@extends('layouts.home')

@section('main')

@if(Auth::user())
    @if(Auth::user()->role('Student'))

        <h3>Мои курсы</h3>
        <div class="row">

        @foreach($courses as $course)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                <?php  $url = asset('uploads');?>
               @if($course->course_image !='')
               <img src="<?php echo $url?>/{{ $course->course_image }}" alt="">
               @else
                <img src="https://via.placeholder.com/320x150.png?text=Фото" alt="" width="320" height="150">
               @endif 
                    <div class="caption">
                        <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                        </h4>
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="ratings">
                        <p>Прогресс: Сделано заданий {{ Auth::user()->lessons()->where('course_id', $course->id)->count() }} 
                            из {{ $course->lessons->count() }} </p>
                    </div>
                </div>
            </div>  
        @endforeach
    @endif
        </div>
        <hr />

    

    <h3>Все курсы</h3>
    <div class="row">
    
    @foreach($courses as $course)
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
            <?php  $url = asset('uploads');?>
               @if($course->course_image !='')
               <img src="<?php echo $url?>/{{ $course->course_image }}" alt="">
               @else
                <img src="https://via.placeholder.com/320x150.png?text=Фото" alt="" width="320" height="150">
               @endif 
                <div class="caption">
                    <h4 class="pull-right">{{ $course->price }}</h4>
                    <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                    </h4>
                    <p>{{ $course->description }}</p>
                </div>
                <div class="ratings">
                    <p class="pull-right">Студенты: {{ $course->students()->count() }}</p>
                    <p>
                        @for ($star = 1; $star <= 5; $star++)
                            @if ($course->rating >= $star)
                                <span class="glyphicon glyphicon-star"></span>
                            @else
                                <span class="glyphicon glyphicon-star-empty"></span>
                            @endif
                        @endfor
                    </p>
                </div>
            </div>
        </div>
      
    @endforeach
    </div>
    @else
    <div class="col-sm-6 col-lg-6 col-md-6">
        <div class="caption">
                    <h4 >Вы не зарегестрированны в системе</h4>
                    <p>Для отображения информации зайдите в систему</p>
                </div>
    </div>
        @endif
@endsection