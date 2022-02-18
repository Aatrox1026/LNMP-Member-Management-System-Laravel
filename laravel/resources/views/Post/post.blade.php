<!DOCTYPE html>
<html>
    <head>
        @laravelViewsStyles()
    </head>
    <body>
        <livewire:post-detail-view :model="$model" />
        <form method="post" action="{{url('comment')}}">
            <input type="text" name="text" placeholder="leave a comment" required>
            <input type="hidden" name="post_id" value="{{$model->id}}" required>
            <input type="submit" value="Comment">
        </form>
        <br>
        @foreach($comments as $comment)
            <font size="4">{{$comment->text}}</font>
            <br>
            <font size="2">{{\App\Models\User::where('id', $comment->user_id)->first()->email}}</font>
            <br><br>
        @endforeach
        @livewireScripts
        @laravelViewsScripts(laravel-views)
    </body>
</html>
