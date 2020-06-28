<button class="folder-dl-up" title="Rename Folder" onclick="document.getElementById({{ $child->id }}).style.display='block'">
    <i class="far fa-edit"></i>
</button>

<div id="{{ $child->id }}" class="modal">
    <form class="modal-content animate" action="/folders/{{ $child->id }}" method="POST">
        @method('PATCH')
        @csrf

        <p><i class="fas fa-edit"></i> Rename Folder</p>

        <div class="folder-input">
            <input type="text" name="folder_name" placeholder="Folder Name" required>

            <button id="submit-green" type="submit">Rename</button>
            <button id="submit-red" type="button" onclick="document.getElementById('{{ $child->id }}').style.display='none'">Cancel</button>
        </div>
    </form>
</div>
