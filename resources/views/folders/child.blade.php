<div class="folder">
    <div id="f-name">
        <p><a href="/folders/{{ $child->id }}"><i class="fas fa-folder"></i> {{ $child->name }}</a></p>
    </div>

    @can('delete', $child)
        <form method="POST" action="/folders/{{ $child->id }}">
            @method('DELETE')
            @csrf

            <button type="submit" id="folder-dl" class="folder-dl-up" title="Delete Folder">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    @endcan

    @can('update', $child)
        @include('folders.update-children')
    @endcan
</div>
