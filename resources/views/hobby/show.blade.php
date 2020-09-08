@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Hobby Detail</div>

                    <div class="card-body">
                        <b>{{$hobby->name}}</b>
                        <p>{{$hobby->description}}</p>

                        @if($hobby->tags->count() > 0)
                            <b>Used Tags (Click to remove)</b>
                            <p>
                                @foreach($hobby->tags as $tag)
                                    <a href="{{route('detachTag',['hobby_id'=> $hobby->id, 'tag_id' => $tag->id])}}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        @endif

                        @if($availableTags->count() > 0)
                            <b>Available Tags (Click to Add)</b>
                            <p>
                                @foreach($availableTags as $tag)
                                    <a href="{{route('attachTag',['hobby_id'=> $hobby->id, 'tag_id' => $tag->id])}}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>

{{--                <div class="mt-2">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
                </div>--}}
            </div>
        </div>
    </div>
@endsection