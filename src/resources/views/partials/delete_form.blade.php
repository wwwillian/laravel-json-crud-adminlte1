@if(Route::has($routePrefix . '.destroy', $id))
<form method="post" action="{{ route($routePrefix . '.destroy', $id) }}" class="delete-form">
    @method('DELETE')
    @csrf
</form>
@endif
