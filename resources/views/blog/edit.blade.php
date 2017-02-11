@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif
<h1>create blog post</h1>

<form action="/blog/{{$blog->id}}" method="post">
    <input type="text" name="title" placeholder="judul" value="{{$blog->title}}"> <br>
    <textarea name="subject" cols="30" rows="10" placeholder="subject">{{$blog->subject}}</textarea>
    <input type="submit" value="edit">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>