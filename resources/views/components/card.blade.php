<div class="card">
    <div class="text-blue-50">{{$title}}</div>
    @if($slot->isEmpty())
        <p>Please provide some content</p>
    @else
        {{$slot}}
    @endif

    <div class="card-footer">{{$footer}}</div>
</div>
