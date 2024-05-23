<div class="container mt-4">
    <h1>Create Document</h1>
    <form id="documentForm" action="?documenttext/Add" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Document Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div id="sections">
            <!-- Dynamic sections will be added here -->
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="addText">Add Text</button>
        <button type="button" class="btn btn-secondary mb-3" id="addImage">Add Image</button>
        <br>
        <button type="submit" class="btn btn-primary">Save Document</button>
    </form>
</div>

<script>
    function addTextSection() {
        var section = document.createElement('div');
        section.className = 'form-group';
        section.innerHTML = `
        <label for="sections[]">Text Section</label>
        <textarea class="form-control" name="sections[]" rows="4" required></textarea>
        <input type="hidden" name="section_type[]" value="text">
        <button type="button" class="btn btn-danger btn-sm delete-section">X</button>
    `;
        document.getElementById('sections').appendChild(section);
    }

    function addImageSection() {
        var section = document.createElement('div');
        section.className = 'form-group';
        section.innerHTML = `
        <label for="sections[]">Image Section</label>
        <input type="file" class="form-control-file" name="sections[]" accept="image/*" required>
        <input type="hidden" name="section_type[]" value="image">
        <button type="button" class="btn btn-danger btn-sm delete-section">X</button>
    `;
        document.getElementById('sections').appendChild(section);
    }

    document.getElementById('addText').addEventListener('click', addTextSection);

    document.getElementById('addImage').addEventListener('click', addImageSection);

    document.getElementById('sections').addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-section')) {
            event.target.parentNode.remove();
        }
    });
</script>