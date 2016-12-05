var URL = '../../../../CoffeeMarket/public/cuenta/register/index';

$("#input-image-1").fileinput({
    uploadExtraData: {
      action: 'carga_archivo'
    },
    uploadUrl: URL,
    allowedFileExtensions: ["jpg", "png", "gif"],
    maxFileCount: 1,
    resizeImage: true,
    maxImageWidth: 300,
    maxImageHeight: 250,
    resizePreference: 'height',
    browseOnZoneClick: true,
}).on('filepreupload', function() {
    $('#kv-success-box').html('');
}).on('fileuploaded', function(event, data) {
  $('#kv-success-box').append(data.response.link);
  $('#kv-success-modal').modal('show');

  foto=true;

});

