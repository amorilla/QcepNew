<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6 text-right">
        <?php
            echo '<a href="'.$GLOBALS['CFG']->url.'/"><button class="btn btn-danger btn-sm delete-document"><i class="fa-solid fa-arrow-left"></i></button></a>'
        ?>
        </div>
        <div class="col-md-6 text-left">
            <h1><?php echo htmlspecialchars($document->getTitle()); ?></h1>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <?php foreach ($sDatos as $section) { ?>
                <div class="section">
                    <?php if ($section->getType() == 'text') { ?>
                        <p class=""><?php echo htmlspecialchars($section->getContent()); ?></p>
                    <?php } elseif ($section->getType() == 'image' && $section->getImage_url() != null) { ?>
                        <img src="<?php echo htmlspecialchars($section->getImage_url()); ?>" alt="Image" class="img-fluid mx-auto d-block"> <!-- 图像居中 -->
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>