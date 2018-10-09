<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>

<script>
	FilePond.registerPlugin(
		FilePondPluginFileEncode,
		FilePondPluginFileValidateType,
		FilePondPluginImageExifOrientation,
		FilePondPluginImagePreview,
		FilePondPluginImageCrop,
		FilePondPluginImageResize,
		FilePondPluginImageTransform
	);

	FilePond.create(
		document.querySelector('input'),
		{
			labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
			imagePreviewHeight: 170,
			imageCropAspectRatio: '1:1',
			imageResizeTargetWidth: 200,
			imageResizeTargetHeight: 200
		}
	);
</script>