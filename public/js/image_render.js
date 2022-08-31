CKEDITOR.replace( 'description' );
CKEDITOR.config.height = '40vh';

CKEDITOR.on('instanceReady', function( ev ) {
    ev.editor.dataProcessor.htmlFilter.addRules({
      elements: {
        p: function (e) { e.attributes.style = 'font-size: 14px; font-family:Roboto;'; }
      }
    });
  });

const fileUpload = document.getElementById('fileUpload');
const img_box = document.getElementById('myImg');
const reader = new FileReader();
fileUpload.addEventListener('change',function(event){
    const files = event.target.files;
    const file = files[0];
    reader.readAsDataURL(file);
    reader.addEventListener('load', function(event){
        img_box.src = event.target.result;
        img_box.alt = file.name; 
    })
})