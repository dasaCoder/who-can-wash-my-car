<div class="list-icons">
    @if(Route::has($route.'.show') && $view)
        <a href="#" class="list-icons-item text-teal-600" onclick="getModel('{{route($route.'.show', $data->id)}}')"><i
                class="icon-eye"></i></a>
    @endif
    @if(Route::has($route.'.edit') && $edit)
        <a href="#" class="list-icons-item text-primary-600" onclick="getModel('{{route($route.'.edit', $data->id)}}')"><i
                class="icon-pencil7"></i></a>
    @endif
    @if(Route::has($route.'.destroy') && $delete)
        <a href="#" class="list-icons-item text-danger-600"
           onclick="deleteRecord('{{route($route.'.destroy', $data->id)}}')"><i class="icon-trash"></i></a>
    @endif
</div>
