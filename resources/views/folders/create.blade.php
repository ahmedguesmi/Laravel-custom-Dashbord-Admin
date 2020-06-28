<p id="show" onclick="document.getElementById('id01').style.display='block'">
    <i class="fas fa-folder-plus"></i> New Folder
</p>

<div id="id01" class="modal">
    <form class="modal-content animate" action="/folders" method="POST">
        @csrf

        <p><i class="fas fa-folder-plus"></i> Create New Folder</p>

        <div class="folder-input">
            <input type="text" name="folder_name" placeholder="Folder Name" required>
            <input type="hidden" name="parent_id" size="2" @isset($folder) value="{{ $folder->id }}" @endisset readonly>

            <button id="submit-green" type="submit">Create</button>
            <button id="submit-red" type="button" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        </div>
    </form>
</div>
