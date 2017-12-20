<form action="{{route('statuses.store')}}" method="post">
    @include('shared._errors')
    {{csrf_field()}}
    <textarea class="form-control" rows="3" placeholder="say something here" name="content">{{old('content')}}</textarea>
    <button type="submit" class="btn btn-primary pull-right">Post</button>
</form>