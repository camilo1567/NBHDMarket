import 'flowbite';
import Dropzone from 'dropzone';
import Alpine from 'alpinejs';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí la imágen de tu producto',
    acceptedFiles: '.png,.jpg,.jpeg',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false
})

dropzone.on('success', function(file, response) {
    document.querySelector('[name="imagen"]').value = response.imagen;
})

dropzone.on('removedfile', function() {})

window.Alpine = Alpine;

Alpine.start();
