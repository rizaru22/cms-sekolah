import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed';
document.addEventListener('DOMContentLoaded', function () {
    // Tempatkan kode CKEditor di sini

    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [MediaEmbed],
            toolbar: ['mediaEmbed', /* ... */],
            // Konfigurasi lainnya
        })
        .then(newEditor => {
            newEditor.model.document.on('change:data', () => {
                window.editor.textContent = `"${newEditor.getData()}"`;
            });
        })
        .catch(error => {
            console.error(error);
        });
});
