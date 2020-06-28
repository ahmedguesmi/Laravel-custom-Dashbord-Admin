<div class="file">
    <p><i class="fas fa-file"></i> {{ $file->name . '.' . $file->ext }}</p>

    @can('delete', $file)
        <form method="POST" action="/files/{{ $file->id }}">
            @method('DELETE')
            @csrf

            <button type="submit" id="file-dl" title="Delete File">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    @endcan

    <a href="/files/{{ $file->id }}" id="file-dwn" title="Download File">
        <i class="fas fa-file-download"></i>
    </a>
</div>
