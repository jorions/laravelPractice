<form action="/post_to_me" method="POST">
    <input type="text" name="name" value="" placeholder="Enter Name" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="submit" />
</form>