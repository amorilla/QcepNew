	<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
		<div class="col-md-5 p-lg-5 mx-auto my-5">
			<h1 class="display-4 fw-normal"><?= $oDatos[0]['nom'] ?></h1>
			<p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
			<a class="btn btn-outline-secondary" href="#">Coming soon</a>
		</div>
		<div class="product-device shadow-sm d-none d-md-block"></div>
		<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
	</div>

	<div class="row">

		<?php
		$htmlOutput = '';

		// 反向排序文档数据数组
		$docDatos = array_reverse($docDatos);

		foreach ($docDatos as $doc) {
			$title = htmlspecialchars($doc->getTitle());
			$createdAt = htmlspecialchars($doc->getCreated_at());
			$dId = htmlspecialchars($doc->getId());
			$hasImage = false; // 默认没有图片

			// 检查文档的图片
			foreach ($sDatos as $section) {
				if ($section->getType() == 'image' && $section->getDocument_id() == $dId && $section->getImage_url() != null) {
					// 如果文档包含图片，将其设置为封面，并标记为true
					$coverImage = $section->getImage_url();
					$hasImage = true;
					break;
				}
			}

			// 根据是否有图片设置封面样式
			$coverStyle = $hasImage ? "background-image: url('$coverImage');" : '';

			// 生成 HTML 输出
			$htmlOutput .= <<<HTML
    <div class="col-md-6 mb-3">
        <a href="?documenttext/show&id={$dId}" class="text-decoration-none">
            <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">$title</h2>
                    <p class="lead">Created at: $createdAt</p>
                </div>
                <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;$coverStyle"></div>
            </div>
        </a>
    </div>
HTML;
		}

		echo $htmlOutput;
		?>




		<div class="col-md-6 mb-3">
			<div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
				<div class="my-3 py-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
				<div class="my-3 p-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
				<div class="my-3 py-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
				<div class="my-3 p-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
				<div class="my-3 py-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
				<div class="my-3 p-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>
	</div>