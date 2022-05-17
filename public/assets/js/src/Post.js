import {
  Notify,
  Element,
  Form,
  Validator,
  Utility,
  Modal,
  Ajax
} from "./module/index.js";
class Post {
  static insert(params) {
    Ajax.post({
      url: "../../src/Lib/register_post.php",
      data: params,
      response: function(res) {
        console.log(res);
        res = JSON.parse(res);
        console.log(res);
        if (res[0] == "invalid") {
          return;
        }

        if (!res.success) {
          Notify.prompt({
              flag: "error",
              message: "Check for errors"
            },
            3000
          );
          for (let err of res) {
            if (err.token) {
              var t = document.getElementById("token");
              t.value = err.token;
              continue;
            }
            let ObjectKeys = Object.keys(err);
            ObjectKeys.forEach(e => {
              let newP = document.createElement("P");
              let sp1 = e.split("$")[0];
              let sp2 = e.split("$")[1];
              if (sp1 == "err" && sp2 != "") {
                let newText = document.createTextNode(err[e]);
                newP.className = "text-danger mb-0";
                newP.appendChild(newText);
                Element.appendElement(document.getElementById(sp2), newP);

              }
            });
          }
        } else {
          Form.resetForm(document.getElementById("add_form"));
          var t = document.getElementById("token");
          t.value = res.token;
          Notify.prompt({
              flag: "success",
              message: "Success"
            },
            3000
          );
        }
      }
    });
  }



  static fetchPost(f, params) {
    console.log("hello");
    let q = Ajax.get({
      url: "../../src/Lib/register_post.php",
      data: params,
      response: function(res) {
        res = JSON.parse(res);
        f.post.value = res.post
        f.status.value = res.status
        f.id.value = res.id
        let optStatus = f.status.querySelectorAll("option")
        f.status.innerHTML = ""
        for (let i of optStatus) {
          if (i.value == res.status) {
            f.status.append(i)
          }
          if (i.value != res.status) {
            f.status.append(i)
          }
          $(f.status).val(`${res.status}`);
        }
      }
    })

  }

  static update(params) {
    Ajax.post({
      url: "../../src/Lib/register_post.php",
      data: params,
      response: function(res) {
        console.log(res);
        res = JSON.parse(res);

        if (res[0] == "invalid") {
          return;
        }

        if (!res.success) {
          Notify.prompt({
              flag: "error",
              message: "Check for errors"
            },
            3000
          );
          Form.validate(res);
        } else {
          // Form.resetForm(document.getElementById("add_form"));
          var t = document.getElementById("token");
          t.value = res.token;
          Notify.prompt({
              flag: "success",
              message: "Success"
            },
            3000
          );
          window.location.reload()
        }
      }
    });
  }


  static get(count, table, params) {
    let q = Ajax.get({
      url: "../../src/Lib/register_post.php",
      data: params,
      response: function(res) {
        res = JSON.parse(res);
        if (count.dataset.count == res.length) {
          console.log("do nothing");
        } else {
          let r = res.length - count;
          let rem = res.slice(count.dataset.count);
          let out = "";

          for (var i of rem) {
            var tr = document.createElement("TR");
            out += ` <td>${i.post}</td> <td>${(i.status==0)?'Disapproved':'Approved'}</td> <td>
            <button class="text-primary edit_voter"><i class="fas fa-pen"></i></button>
            <button class="text-success"><i class="fas fa-eye"></i></button>
            <button class="text-danger"><i class="fas fa-trash"></i></button>
          </td>`
            tr.innerHTML = out;
          }
          console.log(tr);
          let rr = table.firstElementChild.nextElementSibling;
          rr.insertBefore(tr, rr.firstElementChild);
          count.dataset.count = res.length;
          count.innerText = res.length;
        }
      }
    })
  }
}

if (document.getElementById("add_post")) {

  const submit = document.getElementById("add_post");
  // Form.disableBtn(submit, true);
  // Form.disableBtn(updateButton, true);
  // modal popup
  let editBtn = document.querySelectorAll(".edit_post")
  let updateForm = document.querySelector("#update_form")
  let updateButton = document.querySelector("#update_post")
  let addForm = document.querySelector("#add_form")
  // updateForm.style.display = "none";


  // closeBtn.addEventListener("click", function() {
  //   Form.appendForm(document.querySelector("#add_form"))
  //   Modal.close(document.querySelector(".modal"))
  // })

  // modal popup ends
  Form.cloneForm(document.querySelector(".form_val"));
  Form.appendForm(document.querySelector("#add_form"));
  // User Details
  const message = document.querySelector(".message");
  const post = document.getElementById("post");
  const status = document.getElementById("status");
  const table = document.getElementById("table");
  const postCount = document.getElementById("count");
  const id = document.getElementById("id");
  // Token for cross site request forgery(csrf or xsrf)
  const token = document.getElementById("token");

  editBtn.forEach((m) => {
    m.addEventListener("click", function() {
      let data = {
        post: post,
        status: status,
        token: token,
        id: id,
      }
      Post.fetchPost(data, {
        id: this.id
      })
      addForm.parentElement.parentElement.style.display = "none";
      updateForm.parentElement.parentElement.style.display = "block";
      Form.appendForm(updateForm);
    })
  })

  updateButton.addEventListener("click", () => {
    let data = {
      post: post.value,
      status: status.value,
      token: token.value,
      id: id.value,
      update: "update"

    }
    if (validat()) {
      Post.update(data);
    } else {
      Notify.prompt({
          flag: "error",
          message: "Check for errors"
        },
        3000
      );
    }
  });
  const validat = () => {
    let validate = new Validator();
    validate.validate([{
      post: [{
        name: "Post",
        required: true,
        min: 3
      }],
      status: [{
        required: true
      }]
    }]);
    Form.resetErrors(".form-group", "P");
    if (validate.isPassed()) {
      // Form.disableBtn(submit, false)
      // Form.disableBtn(submit, false)
      return true;
    } else {
      // Form.disableBtn(submit, true)
      // Form.disableBtn(submit, true)
      for (let err of validate.errors()) {
        let ObjectKeys = Object.keys(err);
        ObjectKeys.forEach(e => {
          let newP = document.createElement("P");
          let sp1 = e.split("$")[0];
          let sp2 = e.split("$")[1];
          if (sp1 == "err" && sp2 != "") {
            let newText = document.createTextNode(err[e]);
            newP.className = "text-danger mb-0";
            newP.appendChild(newText);
            Element.appendElement(document.getElementById(sp2), newP);
          }
        });
      }
      return false;
    }
  };
  // onInput Validator
  document.querySelectorAll(".form-group").forEach(item => {
    item.addEventListener("click", e => {
      if (e.target.tagName == "INPUT") {
        e.target.addEventListener("input", validat);
      }
    });
  });
  // onFocus Validator
  document.querySelectorAll(".select2-selection--single").forEach(i => {
    i.addEventListener("focus", validat);
  });
  //submit
  submit.addEventListener("click", () => {
    let data = {
      insert: "insert",
      post: post.value,
      status: status.value,
      token: token.value
    }

    if (1) {
      // Notify.prompt("success", 3000)
      // Form.disableBtn(submit, true)
      Post.insert(data);
    } else {
      Notify.prompt({
          flag: "error",
          message: "Check for errors"
        },
        3000
      );
    }
  });

  setInterval(() => {
    Post.get(postCount, table, {
      "data": "data"
    });
  }, 1000);
  // notification
  message.querySelector("button").addEventListener("click", () => {
    Notify.deletePrompt();
  });
}