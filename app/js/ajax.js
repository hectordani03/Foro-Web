/* Enviar formularios via AJAX */
const forms_ajax = document.querySelectorAll(".ajaxForm");

forms_ajax.forEach(form => {

    form.addEventListener("submit",function(e) {
        
        e.preventDefault();

        Swal.fire({
            title: 'Sure?',
            text: "Do you want to perform the requested action?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do',
            cancelButtonText: 'No, cancel'
        }).then((re) => {
            if (re.isConfirmed){

                let data = new FormData(this);
                let method=this.getAttribute("method");
                let action=this.getAttribute("action");

                let headers= new Headers();

                let config={
                    method: method,
                    headers: headers,
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
                };

                fetch(action,config)
                .then(res => res.json())
                .then(res =>{ 
                    ajax_alerts(res);
                    closeModal(); // Cierra el modal

                });
            }
        });

    });

});

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
function ajax_alerts(alert) {
    if(alert.type=="simple"){
        Swal.fire({
            icon: alert.icon,
            title: alert.title,
            text: alert.text,
            confirmButtonText: 'Accept'
        });

    }else if(alert.type=="reload"){

        Swal.fire({
            icon: alert.icon,
            title: alert.title,
            text: alert.text,
            confirmButtonText: 'Accept'
        }).then((result) => {
            if(result.isConfirmed){
                location.reload();
            }
        });

    }else if(alert.type=="clean"){

        Swal.fire({
            icon: alert.icon,
            title: alert.title,
            text: alert.text,
            confirmButtonText: 'Accept'
        }).then((result) => {
            if(result.isConfirmed){
                document.querySelector(".ajaxForm").reset();
            }
        });

    }else if(alert.type=="redirect"){
        window.location.href=alert.url;
    }
}

/* Boton cerrar sesion */
function logout() {
    Swal.fire({
        title: 'Do you want to log out?',
        text: "The current session will be closed and you will log out",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, exit',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = document.getElementById('btn_logout').getAttribute('href');
            window.location.href = url;
        }
    });
}

// Verificar si el botón de cerrar sesión existe antes de agregar el event listener
let btn_logout = document.getElementById('btn_logout');
if (btn_logout) {
    btn_logout.addEventListener('click', function(e) {
        e.preventDefault();
        logout();
    });
}
