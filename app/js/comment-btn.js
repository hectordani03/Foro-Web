const d = document
const $btn = d.querySelectorAll('#comment-button')

$btn.forEach(btn => { 
    btn.addEventListener('click', e => {
        Swal.fire({
            title: 'Comentario',
            input: 'text',
            inputPlaceholder: 'Escribe tu comentario',
            showCancelButton: true,
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#1d3e53',
            cancelButtonColor: '#d33',
            inputValidator: (value) => {
                if (!value) {
                    return '¡Escribe algo!'
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    '¡Comentario enviado!',
                    'Gracias por tu comentario',
                    'success'
                    )
                }
            })
        })
    });