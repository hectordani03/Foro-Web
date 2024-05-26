const app_ad = {
  routes: {
    /* VIEWS */

    /* CONTROLLERS */
    register: "/Register/register",
    deleteUser: "/User/deleteUser",
    updateAdProfile: "/Profile/updateUser",

    suspendUser: "/Suspensions/createSuspension",
    removeBanUser: "/Suspensions/removeSuspension",

    reportUser: "/Reports/reportUser",
    reportPost: "/Reports/reportPost",
    reportComt: "/Reports/reportComment",
    deletePost: "/Posts/deletePost",
    deleteComt: "/Comments/deleteComt",
  },

  registerUser: function () {
    const rf = $("#register-form");
    rf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      rf.find('button[type="submit"]').prop("disabled", true);
      let p1 = $("#password");
      let p2 = $("#password2");
      if (p1.val() !== p2.val()) {
        alerts({
          type: "function",
          icon: "error",
          text: "Passwords dont match",
          callback: function () {
            p2.val("");
            p2.trigger("focus");
            e.preventDefault();
            rf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else {
        const data = new FormData(this);
        fetch(app_ad.routes.register, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "success",
                text: "User added successfully",
              });
            } else if (res.r === "r") {
              alerts({
                type: "function",
                icon: "error",
                text: "The EMAIL you just entered is already registered in the system, please check and try again",
                callback: function () {
                  rf[0].reset();
                  rf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "e") {
              alerts({
                type: "function",
                icon: "error",
                text: "Filds can not be empty",
                callback: function () {
                  rf[0].reset();
                  rf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "q") {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            }
          })
          .catch(() => {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          });
      }
    });
  },

  updateUser: function () {
    const uuf = $("#updateUser-form");
    uuf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      uuf.find('button[type="submit"]').prop("disabled", true);
      const us = $("#username");
      const em = $("#email");
      const p1 = $("#password");
      const p2 = $("#password2");
      const file = $("#profilePic")[0].files[0];
      const data = new FormData(this);
      if (us.val() === "" || em.val() === "") {
        alerts({
          type: "function",
          icon: "error",
          text: "Fields can not be empty",
          callback: function () {
            e.preventDefault();
            uuf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else if (file && file.size / (1024 * 1024) > 2) {
        alerts({
          type: "function",
          icon: "error",
          text: "The image you have selected exceeds the allowed weight 2 MB.",
          callback: function () {
            e.preventDefault();
            uuf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else if (p1.val() !== p2.val()) {
        alerts({
          type: "function",
          icon: "error",
          text: "Passwords dont match",
          callback: function () {
            p2.val("");
            p2.trigger("focus");
            e.preventDefault();
            uuf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else {
        fetch(app_ad.routes.updateAdProfile, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "function",
                text: "Changes made successfully",
                icon: "success",
                callback: function () {
                  location.reload();
                },
              });
            } else if (res.r === "r") {
              alerts({
                type: "function",
                icon: "error",
                text: "The EMAIL you just entered is already registered in the system, please check and try again",
                callback: function () {
                  uuf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "e") {
              alerts({
                type: "function",
                icon: "error",
                text: "Filds can not be empty",
                callback: function () {
                  uuf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "q") {
              alerts({
                type: "function",
                type: "error",
                text: "Unexpected error, please try again",
                callback: function () {
                  uuf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            }
          })
          .catch(() => {
            alerts({
              type: "function",
              type: "error",
              text: "Unexpected error, please try again",
              callback: function () {
                uuf.find('button[type="submit"]').prop("disabled", false);
              },
            });
          });
      }
    });
  },

  deleteUser: function () {
    $(function () {
      const df = $("#delete-form");
      df.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        const data = new FormData(this);
        fetch(app_ad.routes.deleteUser, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "success",
                text: "User deleted successfully",
              });
            } else if (res.r === "e") {
              alerts({
                type: "normal",
                icon: "error",
                text: "Filds can not be empty",
              });
            } else if (res.r === "q") {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            }
          })
          .catch((err) => {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          });
      });
    });
  },

  reportUser: function () {
    $(function () {
      const repf = $("#reportu-form");
      repf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let us = $("#rusername");
        let em = $("#remail");
        let r = $("#reason");
        let o = $("#other");
        if (
          us.val() === "" ||
          em.val() === "" ||
          r.val() === "" ||
          (r.val() === "Other" && o.val() === "")
        ) {
          alerts({
            type: "function",
            icon: "error",
            text: "Filds can not be empty",
            callback: function () {
              e.preventDefault();
            },
          });
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.reportUser, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r === true) {
                alerts({
                  type: "success",
                  text: "User reported successfully",
                });
              } else if (res.r === "e") {
                alerts({
                  type: "normal",
                  icon: "error",
                  text: "Filds can not be empty",
                });
              } else if (res.r === "q") {
                alerts({
                  type: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },

  suspendUser: function () {
    $(function () {
      const supf = $("#suspendu-form");
      supf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        supf.find('button[type="submit"]').prop("disabled", true);
        const data = new FormData(this);
        fetch(app_ad.routes.suspendUser, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "success",
                text: "User suspended successfully",
              });
            } else if (res.r === "e") {
              alerts({
                type: "normal",
                icon: "error",
                text: "Filds can not be empty",
              });
            } else if (res.r === "q") {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            }
          })
          .catch((err) => {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          });
      });
    });
  },

  removeBanUser: function () {
    $(function () {
      const rebf = $("#removebu-form");
      rebf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        rebf.find('button[type="submit"]').prop("disabled", true);
        let uid = $("#userIdrb");
        let r = $("#reasonrb");
        if (uid.val() === "" || r.val() === "") {
          alerts({
            type: "function",
            icon: "error",
            text: "Filds can not be empty",
            callback: function () {
              rebf.find('button[type="submit"]').prop("disabled", false);
              e.preventDefault();
            },
          });
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.removeBanUser, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r === true) {
                alerts({
                  type: "success",
                  text: "User Re-establish successfully",
                });
              } else if (res.r === "e") {
                alerts({
                  type: "function",
                  icon: "error",
                  text: "Filds can not be empty",
                  callback: function () {
                    rebf.find('button[type="submit"]').prop("disabled", false);
                  },
                });
              } else if (res.r === "q") {
                alerts({
                  type: "function",
                  type: "error",
                  text: "Unexpected error, please try again",
                  callback: function () {
                    rebf.find('button[type="submit"]').prop("disabled", false);
                  },
                });
              }
            })
            .catch((err) => {
              alerts({
                type: "function",
                type: "error",
                text: "Unexpected error, please try again",
                callback: function () {
                  rebf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            });
        }
      });
    });
  },

  reportPost: function () {
    $(function () {
      const repf = $("#reportp-form");
      repf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let t = $("#text");
        let c = $("#category");
        let r = $("#reason");
        let o = $("#other");
        if (
          c.val() === "" ||
          r.val() === "" ||
          (r.val() === "Other" && o.val() === "")
        ) {
          alerts({
            type: "function",
            icon: "error",
            text: "Fields can not be empty",
            callback: function () {
              e.preventDefault();
            },
          });
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.reportPost, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r === true) {
                alerts({
                  type: "success",
                  text: "Post reported successfully",
                });
              } else if (res.r === "e") {
                alerts({
                  type: "normal",
                  icon: "error",
                  text: "Filds can not be empty",
                });
              } else if (res.r === "q") {
                alerts({
                  type: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },

  reportComt: function () {
    $(function () {
      const repf = $("#reportc-form");
      repf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let c = $("#content");
        let r = $("#reason");
        let o = $("#other");
        if (
          c.val() === "" ||
          r.val() === "" ||
          (r.val() === "Other" && o.val() === "")
        ) {
          alerts({
            type: "function",
            icon: "error",
            text: "Fields can not be empty",
            callback: function () {
              e.preventDefault();
            },
          });
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.reportComt, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r === true) {
                alerts({
                  type: "success",
                  text: "Comment reported successfully",
                });
              } else if (res.r === "e") {
                alerts({
                  type: "function",
                  icon: "error",
                  text: "Filds can not be empty",
                  callback: function () {
                    apf[0].reset();
                  },
                });
              } else if (res.r === "q") {
                alerts({
                  type: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },

  deletePost: function () {
    $(function () {
      const df = $("#deletep-form");
      df.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        const data = new FormData(this);
        fetch(app_ad.routes.deletePost, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "success",
                text: "Post added successfully",
              });
            } else if (res.r === "e") {
              alerts({
                type: "normal",
                icon: "error",
                text: "Filds can not be empty",
              });
            } else if (res.r === "q") {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            }
          })
          .catch((err) => {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          });
      });
    });
  },

  deleteComt: function () {
    $(function () {
      const df = $("#deletec-form");
      df.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        const data = new FormData(this);
        fetch(app_ad.routes.deleteComt, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "success",
                text: "Comment deleted successfully",
              });
            } else if (res.r === "e") {
              alerts({
                type: "normal",
                icon: "error",
                text: "Filds can not be empty",
              });
            } else if (res.r === "q") {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            }
          })
          .catch((err) => {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          });
      });
    });
  },

  userDT: function () {
    const userDT = $("#userDT").DataTable({
      processing: true,
      //   serverSide: true,
      ajax: {
        url: "http://forus.com/user/getUsers",
        dataSrc: "",
      },
      columns: [
        {
          title: "ID",
          data: "id",
        },
        {
          title: "Username",
          data: "username",
        },
        {
          title: "Email",
          data: "email",
        },
        {
          title: "Role",
          data: "role",
        },
        {
          title: "Status",
          data: "active",
        },
        {
          title: "Profile Picture",
          data: "profilePic",
          render: function (data, type, row) {
            if (type === "display" && data) {
              return (
                '<img src="http://forus.com/resources/assets/img/profile/' +
                data +
                '" alt="Image" width="40" height="40">'
              );
            } else {
              return data;
            }
          },
        },
        {
          title: "Registration",
          data: "registered_at",
        },
        {
          title: "Report",
          render: function (data, type, row) {
            return '<button class="button warning-button btn-user-reports">Report</button>';
          },
        },
        {
          title: "Delete",
          visible: app.user.id === 1,
          render: function (data, type, row) {
            return '<button class="button danger-button btn-user-delete">Delete</button>';
          },
        },
      ],
      drawCallback: function () {
        $("#userDT thead th, tbody td").css("text-align", "center");

        $(".btn-user-reports").on("click", function () {
          const rowData = userDT.row($(this).closest("tr")).data();
          if (rowData) {
            reportUserModal(rowData);
          }
        });

        $(".btn-user-delete").on("click", function () {
          const rowData = userDT.row($(this).closest("tr")).data();
          if (rowData) {
            userDeleteModal(rowData);
          }
        });
      },
    });
  },

  postDT: function () {
    const postDT = $("#postDT").DataTable({
      processing: true,
      //   serverSide: true,
      ajax: {
        url: "http://forus.com/posts/getPosts",
        dataSrc: "",
      },
      columns: [
        {
          title: "ID",
          data: "id",
        },
        {
          title: "User id",
          data: "userId",
        },
        {
          title: "Content",
          data: "text",
        },
        {
          title: "Category",
          data: "category",
        },
        {
          title: "Img",
          data: "img",
          render: function (data, type, row) {
            if (type === "display" && data) {
              return (
                '<img src="http://forus.com/resources/assets/img/post/' +
                data +
                '" alt="Image" width="40" height="40">'
              );
            } else {
              return data;
            }
          },
        },
        {
          title: "Created at",
          data: "created_at",
        },
        {
          title: "Report",
          render: function (data, type, row) {
            return (
              '<button class="button warning-button btn-view-post" data-id="' +
              row.id +
              '">Report</button>'
            );
          },
        },
      ],
      drawCallback: function () {
        $("#postDT thead th, tbody td").css("text-align", "center");

        $(".btn-view-post").on("click", function () {
          const rowData = postDT.row($(this).closest("tr")).data();

          if (rowData) {
            reportPostModal(rowData);
          }
        });
      },
    });
  },

  comtDT: function () {
    const comtDT = $("#comtDT").DataTable({
      processing: true,
      //   serverSide: true,
      ajax: {
        url: "http://forus.com/comments/getAllComments",
        dataSrc: "",
      },

      columns: [
        {
          title: "ID",
          data: "id",
        },
        {
          title: "User id",
          data: "userId",
        },
        {
          title: "Post id",
          data: "postId",
        },
        {
          title: "Content ",
          data: "content",
        },
        {
          title: "Created at",
          data: "created_at",
        },
        {
          title: "Report",
          render: function (data, type, row) {
            return (
              '<button class="button warning-button btn-view-comment" data-id="' +
              row.id +
              '">Report</button>'
            );
          },
        },
      ],
      drawCallback: function () {
        $("#comtDT thead th, tbody td").css("text-align", "center");

        $(".btn-view-comment").on("click", function () {
          const rowData = comtDT.row($(this).closest("tr")).data();

          if (rowData) {
            reportCommentModal(rowData);
          }
        });
      },
    });
  },

  reportUserDT: function () {
    const reportUserDT = $("#reportUserDT").DataTable({
      processing: true,
      //   serverSide: true,
      ajax: {
        url: "http://forus.com/reports/getReportedUsers",
        dataSrc: "",
      },
      columns: [
        {
          title: "ID",
          data: "id",
        },
        {
          title: "Reported User",
          data: "reportedUser",
        },
        {
          title: "Reporting user",
          data: "userId",
        },
        {
          title: "Reason",
          data: "reason",
        },
        {
          title: "Status",
          data: "active",
        },
        {
          title: "Created at",
          data: "created_at",
        },
        {
          title: "Actions",
          render: function (data, type, row) {
            var isSuspended = row.suspendedUser !== null;

            if (row.active_user === 1 && row.active != 1 && !isSuspended) {
              return '<button class="button warning-button btn-suspend-user">Suspend</button>';
            } else if (app.user.role === "1" && row.active_user === 0) {
              return '<button class="button warning-button btn-remove-ban-user">Remove ban</button>';
            } else if (row.active_user !== 1) {
              return '<label class="danger-button">Suspended</label>';
            } else if (row.active_user === 1 && row.active === 1) {
              return '<label class="success-button">Re-establish</label>';
            } else {
              return "";
            }
          },
        },
      ],
      drawCallback: function () {
        $("#reportUserDT thead th, tbody td").css("text-align", "center");

        $(".btn-suspend-user").on("click", function () {
          const rowData = reportUserDT.row($(this).closest("tr")).data();
          if (rowData) {
            suspendUserModal(rowData);
          }
        });

        $(".btn-remove-ban-user").on("click", function () {
          const rowData = reportUserDT.row($(this).closest("tr")).data();
          if (rowData) {
            removeBanModal(rowData);
          }
        });
      },
    });
  },

  reportPostDT: function () {
    const reportPostDT = $("#reportPostDT").DataTable({
      processing: true,
      //   serverSide: true,
      ajax: {
        url: "http://forus.com/reports/getReportedPosts",
        dataSrc: "",
      },
      columns: [
        {
          title: "Post ID",
          data: "id",
        },
        {
          title: "Owner",
          data: "owner",
        },
        {
          title: "Report",
          data: "reason",
        },
        {
          title: "Status",
          data: "active",
        },
        {
          title: "Created at",
          data: "created_at",
        },
        {
          title: "Actions",
          render: function (data, type, row) {
            var active = row.active;
            if (active === 0) {
              return '<button class="button danger-button btn-delete-post">Delete</button>';
            } else {
              return "";
            }
          },
        },
      ],
      drawCallback: function () {
        $("#reportPostDT thead th, tbody td").css("text-align", "center");

        $(".btn-delete-post").on("click", function () {
          const rowData = reportPostDT.row($(this).closest("tr")).data();

          if (rowData) {
            deletePostModal(rowData);
          }
        });
      },
    });
  },

  reportComtDT: function () {
    const reportComtDT = $("#reportComtDT").DataTable({
      processing: true,
      //   serverSide: true,
      ajax: {
        url: "http://forus.com/reports/getReportedComments",
        dataSrc: "",
      },
      columns: [
        {
          title: "Comment ID",
          data: "commentId",
        },
        {
          title: "Owner",
          data: "owner",
        },
        {
          title: "Report",
          data: "reason",
        },
        {
          title: "Status",
          data: "active",
        },
        {
          title: "Created at",
          data: "created_at",
        },
        {
          title: "Actions",
          render: function (data, type, row) {
            var active = row.active;
            if (active === 0) {
              return '<button class="button danger-button btn-delete-comment">Delete</button>';
            } else {
              return "";
            }
          },
        },
      ],
      drawCallback: function () {
        $("#reportComtDT thead th, tbody td").css("text-align", "center");

        $(".btn-delete-comment").on("click", function () {
          const rowData = reportComtDT.row($(this).closest("tr")).data();

          if (rowData) {
            deleteComtModal(rowData);
          }
        });
      },
    });
  },
};

function userDeleteModal(userDatad) {
  $('#delete-modal input[name="userId"]').val(userDatad.id);
  $('#delete-modal input[name="profilePic"]').val(userDatad.profilePic);
  $('#delete-modal input[name="username"]').val(userDatad.username);
  $('#delete-modal input[name="email"]').val(userDatad.email);
  $("#delete-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function reportUserModal(userDatar) {
  $('#report-modal input[name="userId"]').val(userDatar.id);
  $('#report-modal input[name="username"]').val(userDatar.username);
  $('#report-modal input[name="email"]').val(userDatar.email);
  $("#report-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function suspendUserModal(userDatas) {
  $('#suspend-modal input[name="reportId"]').val(userDatas.id);
  $('#suspend-modal input[name="email"]').val(userDatas.email);
  $('#suspend-modal input[name="username"]').val(userDatas.username);
  $('#suspend-modal input[name="userId"]').val(userDatas.reportedUser);
  $('#suspend-modal input[name="reason"]').val(userDatas.reason);
  $("#suspend-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function removeBanModal(userDatab) {
  $('#remove-ban-modal input[name="reportId"]').val(userDatab.id);
  $('#remove-ban-modal input[name="email"]').val(userDatab.email);
  $('#remove-ban-modal input[name="username"]').val(userDatab.username);
  $('#remove-ban-modal input[name="userId"]').val(userDatab.reportedUser);
  $('#remove-ban-modal input[name="reason"]').val(userDatab.reason);
  $("#remove-ban-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function reportPostModal(postDatar) {
  $('#report-modal input[name="postId"]').val(postDatar.id);
  $('#report-modal input[name="text"]').val(postDatar.text);
  $('#report-modal input[name="category"]').val(postDatar.category);
  $("#report-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function deletePostModal(postDatad) {
  $('#delete-post-modal input[name="postId"]').val(postDatad.id);
  $('#delete-post-modal input[name="img"]').val(postDatad.img);
  $('#delete-post-modal input[name="reason"]').val(postDatad.reason);
  $("#delete-post-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function reportCommentModal(comtDatar) {
  $('#report-modal input[name="commentId"]').val(comtDatar.id);
  $('#report-modal input[name="content"]').val(comtDatar.content);
  $("#report-modal").css("display", "block");
  $("body").removeClass("overflow-auto").addClass("overflow-hidden");
}

function deleteComtModal(comtDatad) {
  $('#delete-comt-modal input[name="commentId"]').val(comtDatad.commentId);
  $('#delete-comt-modal input[name="content"]').val(comtDatad.content);
  $('#delete-comt-modal input[name="reason"]').val(comtDatad.reason);
  $("#delete-comt-modal").css("display", "block");
}

$("#btn-add").on("click", function () {
  $("#add-modal").css("display", "block");
});

function showInput() {
  var select = document.getElementById("reason");
  var other = document.getElementById("other-r");

  other.innerHTML = "";

  if (select.value === "Other") {
    var input = document.createElement("input");
    input.type = "text";
    input.placeholder = "Please specify";
    input.name = "other";
    input.id = "other";
    input.className = "form-control";
    other.appendChild(input);
  }
}