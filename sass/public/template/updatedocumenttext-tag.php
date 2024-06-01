<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Update Document</h1>
        <div>
            <!-- 删除按钮 -->
            <button type="button" class="btn btn-danger btn-sm delete-document" data-toggle="modal" data-target="#deleteModal">Delete</button>
            <!-- 返回按钮 -->
            <?php
              echo '<a href="'.$GLOBALS['CFG']->url.'/?documenttext/showall" class="btn btn-secondary btn-sm volver-button">Volver</a>'
            ?>
        </div>
    </div>
    <!-- 模态框 -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this document?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <form id="documentForm" action="?documenttext/update" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Document Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($documento->getTitle()); ?>" required>
        </div>
        <div id="sections">
            <?php foreach ($sDatos as $section) : ?>
                <?php if ($section->getType() === 'text') : ?>
                    <div class="form-group">
                        <label for="sections[]">Text Section</label>
                        <textarea class="form-control" name="sections[]" rows="4" required><?php echo htmlspecialchars($section->getContent()); ?></textarea>
                        <input type="hidden" name="section_type[]" value="text">
                        <button type="button" class="btn btn-danger btn-sm delete-section">X</button>
                    </div>
                <?php elseif ($section->getType() === 'image') : ?>
                    <div class="form-group">
                        <label for="sections[]">Image Section</label>
                        <img src="<?php echo htmlspecialchars($section->getImage_url()); ?>" alt="Image" style="max-width: 100px;">
                        <input type="file" class="form-control-file" name="sections[]" accept="image/*">
                        <input type="hidden" name="section_type[]" value="image">
                        <button type="button" class="btn btn-danger btn-sm delete-section">X</button>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <input type="hidden" name="idDoc" value="<?= htmlspecialchars($documento->getId()) ?>">
        <button type="button" class="btn btn-secondary mb-3" id="addText">Add Text</button>
        <button type="button" class="btn btn-secondary mb-3" id="addImage">Add Image</button>
        <br>
        <button type="submit" class="btn btn-primary">Update Document</button>
    </form>
</div>

<!-- 引入Bootstrap和jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    document.getElementById('confirmDelete').addEventListener('click', function() {
        var form = document.createElement('form');
        form.method = 'post';
        form.action = '$GLOBALS['CFG']->url."/?documenttext/delete"';

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'document_id';
        input.value = '<?php echo htmlspecialchars($documento->getID()); ?>';

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
</script>