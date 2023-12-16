<?php
require("top.inc.php");   
$msg='';      

// prx($_SERVER['PHP_SELF'])
?>

<!-- Bootstrap styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->


  <!-- Generic page styles -->
  <style>
    #navigation {
      margin: 10px 0;
    }

    @media (max-width: 767px) {

      #title,
      #description {
        display: none;
      }
    }
  </style>
  <!-- blueimp Gallery styles -->
  <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />
  <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
  <link rel="stylesheet" href="./assets/css/progress_bar_css/jquery.fileupload.css" />
  <link rel="stylesheet" href="./assets/css/progress_bar_css/jquery.fileupload-ui.css" />
  <!-- CSS adjustments for browsers with JavaScript disabled -->
  <noscript>
    <link rel="stylesheet" href="./assets/css/progress_bar_css/jquery.fileupload-noscript.css" />
  </noscript>
  <noscript>
    <link rel="stylesheet" href="./assets/css/progress_bar_css/jquery.fileupload-ui-noscript.css" />
  </noscript>

<div class="content pb-0">
    <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Image2</strong><small> Form</small></div>
                        <div class="container">
                            <form method="post" enctype="multipart/form-data" class="" id="fileupload" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="card-body card-block">

                                </div>
                                    <div class="form-group mb-3">
                                            <label for="thumb_image" class=" form-control-label">Upload Thumbnail Image</label>
                                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                            <noscript><input type="hidden" name="redirect" value="<?php echo $_SERVER['PHP_SELF']; ?>" /></noscript>
                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <div class="col-lg-7">
                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                <span class="btn btn-success fileinput-button">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    <span>Add files...</span>
                                                    <input type="file" name="files[]" multiple />
                                                </span>
                                                <!-- <button type="submit" class="btn btn-primary start">
                                                    <i class="glyphicon glyphicon-upload"></i>
                                                    <span>Start upload</span>
                                                </button> -->
                                                <button type="reset" class="btn btn-warning cancel">
                                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                                    <span>Cancel upload</span>
                                                </button>
                                                <button type="button" class="btn btn-danger delete">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>Delete selected</span>
                                                </button>
                                                <input type="checkbox" class="toggle" />
                                                <!-- The global file processing state -->
                                                <span class="fileupload-process"></span>
                                                </div>
                                                <!-- The global progress state -->
                                                <div class="col-lg-5 fileupload-progress fade">
                                                <!-- The global progress bar -->
                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
                                                </div>
                                                <!-- The extended global progress state -->
                                                <div class="progress-extended">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!-- The table listing the files available for upload/download -->
                                            <table role="presentation" class="table table-striped">
                                                <tbody class="files"></tbody>
                                            </table>




                                    </div>
                                    
                                    <button id="img_submit_btn" name="img_submit" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                    <div class="field_error"><?php echo $msg; ?></div>
                                </div>
                            </form>

                        </div>
                     </div>
                  </div>
               </div>
    </div>
</div>
  <!-- The blueimp Gallery widget -->
  <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" aria-label="image gallery"
    aria-modal="true" role="dialog" data-filter=":even">
    <div class="slides" aria-live="polite"></div>
    <h3 class="title"></h3>
    <a class="prev" aria-controls="blueimp-gallery" aria-label="previous slide" aria-keyshortcuts="ArrowLeft"></a>
    <a class="next" aria-controls="blueimp-gallery" aria-label="next slide" aria-keyshortcuts="ArrowRight"></a>
    <a class="close" aria-controls="blueimp-gallery" aria-label="close" aria-keyshortcuts="Escape"></a>
    <a class="play-pause" aria-controls="blueimp-gallery" aria-label="play slideshow" aria-keyshortcuts="Space"
      aria-pressed="false" role="button"></a>
    <ol class="indicator"></ol>
  </div>

  <!-- The template to display files available for upload -->
  <script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>Edit</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="btn btn-primary start" disabled>
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>Start</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
  <!-- The template to display files available for download -->
  <script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  <p class="name">
                      {% if (file.url) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                      {% } else { %}
                          <span>{%=file.name%}</span>
                      {% } %}
                  </p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="glyphicon glyphicon-trash"></i>
                          <span>Delete</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
    crossorigin="anonymous"></script> -->
  <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
  <script src="./assets/js/progress_bar_JS/vendor/jquery.ui.widget.js"></script>
  <!-- The Templates plugin is included to render the upload/download listings -->
  <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
  <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
  <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
  <!-- The Canvas to Blob plugin is included for image resizing functionality -->
  <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
  <!-- blueimp Gallery script -->
  <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
  <script src="./assets/js/progress_bar_JS/jquery.iframe-transport.js"></script>
  <!-- The basic File Upload plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload.js"></script>
  <!-- The File Upload processing plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload-process.js"></script>
  <!-- The File Upload image preview & resize plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload-image.js"></script>
  <!-- The File Upload audio preview plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload-audio.js"></script>
  <!-- The File Upload video preview plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload-video.js"></script>
  <!-- The File Upload validation plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload-validate.js"></script>
  <!-- The File Upload user interface plugin -->
  <script src="./assets/js/progress_bar_JS/jquery.fileupload-ui.js"></script>
  <!-- The main application script -->
  <!-- <script src="./assets/js/progress_bar_JS/demo.js"></script> -->
    <!-- <script type="module">
        // import Pintura Image Editor functionality:
        import { openDefaultEditor } from './assets/js/progress_bar_JS/vendor/pintura.min.js';
        $(function () {
            $('#fileupload').fileupload('option', {
            // When editing a file use Pintura Image Editor:
            edit: function (file) {
                return new Promise((resolve, reject) => {
                const editor = openDefaultEditor({ src: file });
                editor.on('process', ({ dest }) => { resolve(dest); });
                editor.on('close', () => { resolve(file); });
                });
            }
            });
        });
    </script> -->
    <script>
          $('#fileupload').fileupload();
    </script>
<?php
require("footer.inc.php");
?>
