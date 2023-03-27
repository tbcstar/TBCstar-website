<div wire:ignore>
    <script src="https://cdn.tiny.cloud/1/wwqqv9id7ffnpz5q9ych4h63q8thnarin4suzc90i3jyrp4x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <textarea
        x-data
        @wysiwyg-updated.window="tinyMCE.get('page_text').setContent(event.detail.content);"
        x-ref="textarea"
        x-init="
                tinymce.init({
                path_absolute: '/',
                selector: 'textarea.page_text',
                plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen ',
                        'insertdatetime media nonbreaking save table directionality',
                        'emoticons template paste textpattern  imagetools help  '
                    ],
                toolbar: 'insertfile undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | help ',
                relative_urls: false,
                remove_script_host : false,
                document_base_url: '{{config('app.url')}}/',
                language: 'ru',
                setup: function (editor) {
                        editor.on('init change', function ()
                                 {
                                     editor.save();
                                 });
                        editor.on('change', function (e)
                                {
                                    @this.set('page_text', editor.getContent());
                                });
                        editor.on('init', function (e)
                                {

                                });
                        editor.on('dblclick', function (e)
                                {

                                });
                        },
                init_instance_callback: function(editor) {
                        editor.on('ExecCommand', function(e) {

                        });
                        },
                file_picker_callback : function(callback, value, meta) {
                      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                      var cmsURL = '/' + 'admin/laravel-filemanager?editor=' + meta.fieldname;
                      if (meta.filetype == 'image') {
                        cmsURL = cmsURL + '&type=Images';
                      } else {
                        cmsURL = cmsURL + '&type=Files';
                      }

                      tinyMCE.activeEditor.windowManager.openUrl({
                        url : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.7,
                        height : y * 0.7,
                        resizable : 'yes',
                        close_previous : 'no',
                        onMessage: (api, message) => {
                          callback(message.content);
                       }
                        });
                    }

                });
                "
          {{ $attributes }}
    >
    </textarea>

</div>
