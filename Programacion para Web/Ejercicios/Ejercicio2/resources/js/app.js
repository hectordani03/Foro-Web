const app = {
    urlPosts: 'https://jsonplaceholder.typicode.com/posts',
    urlComments: 'https://jsonplaceholder.typicode.com/comments',
    urlUsers: 'https://jsonplaceholder.typicode.com/users',

    userId: "",

    loadPosts: async function () {
        const cont = $("#content");
        cont.css("width", "100%");
        cont.addClass("mx-auto mt-5");
        let html = ""

        let urlaux = ""
        if (this.userId != "") {
            urlaux = `?userId=${this.userId}`;
        }

        let r = await fetch(this.urlUsers)
            .then(response => response.json())
            .catch(error => console.log("Se produjo un error", error));

        fetch(this.urlPosts)
            .then(response => response.json())
            .then(posts => {
                for (let post of posts) {
                    html += `<div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">${post.title}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">${r[post.userId - 1].name}</h6>
                        <p class="card-text">${post.body}</p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        <button class="btn btn-primary" type="button" id="btn-ver-com${post.id}" onclick="app.loadComment(${post.id})">Ver Comentarios<i class="bi bi-caret-down-fill"></i></button>
                        <button class="btn btn-link d-none" type="button" id="btn-cer-com${post.id}" onclick="app.closeComments(${post.id})">Cerrar Comentarios<i class="bi bi-caret-up-fill"></i></button>
                        <div class="spinner-border text-primary d-none float-end" role="status" id="loading${post.id}">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div id="card-com${post.id}" class="card d-none">
                            <ul class="list-group list-group-flush" id="comments${post.id}">
                            </ul>
                        </div>
                    </div>
                </div>`;
                }
                cont.html(html);
            }).catch(error => console.log("Se produjo un error", error));
    },
    loadUsers : function () {
        const users = $("#autores")
        let html = ""
        users.html(html)
        fetch(this.urlUsers)
            .then(response => response.json())
            .then(usrs => {
                for (let u of usrs) {
                    html += `<button type="button" class="list-group-item list-group-item-action" id="up${u.id}" onclick="app.userPosts(${u.id})">${u.name}<br><small>${u.email}</small>
                    </button>`;
                }
                users.html(html);
            }).catch(error => console.log("Se produjo un error", error));
    },
    userPosts: function (userId) {
        $("#up" + this.userId).removeClass("active")
        $("#up" + userId).addClass("active")
        this.loadPosts();
        this.userId = userId;
        this.loadPosts();
    },
    loadComment: function (postId) {
        let html = ""
        const listaCom = $("#comments" + postId);
        $("#loading" + postId).toggleClass("d-none", false);
        fetch(this.urlComments + `?postId=${postId}`)
            .then(response => response.json())
            .then(comments => {
                for (let comment of comments) {
                    html += `<li class="list-group-item">
                        De: <b>${comment.email}</b>
                        <br>
                        ${comment.body}
                    </li>`;
                }
                listaCom.html(html);
                $("#card-com" + postId).toggleClass("d-none", false);
                $("#btn-ver-com" + postId).toggleClass("d-none", true);
                $("#btn-cer-com" + postId).toggleClass("d-none", false);
            }).catch(error => console.log("Se produjo un error", error))
            .finally(() => {
                $("#loading" + postId).toggleClass("d-none", true);
            });
    },
    closeComments: function (postId) {
        $("#comments" + postId).html("");
        $("#card-com" + postId).toggleClass("d-none", true);
        $("#btn-ver-com" + postId).toggleClass("d-none", false);
        $("#btn-cer-com" + postId).toggleClass("d-none", true);
    }
}

window.onload = function () {
    app.loadPosts();
    app.loadUsers();
}
