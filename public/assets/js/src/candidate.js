import {
  Notify,
  Element,
  Form,
  Validator,
  Utility,
  Modal,
  imageUploader,
  Ajax
} from "./module/index.js";
class Candidate {
  static insert(params) {
    Ajax.post({
      url: "../../src/Lib/register_candidate.php",
      data: params,
      response: function(res) {
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
        }
      }
    });
  }

  static update(params) {
    Ajax.post({
      url: "../../src/Lib/register_candidate.php",
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
      url: "../../src/Lib/register_candidate.php",
      data: params,
      response: function(res) {

        res = JSON.parse(res);
        if (count.dataset.count != res.length) {
          let r = res.length - count;
          let rem = res.slice(count.dataset.count);
          let out = "";

          for (var i of rem) {
            var tr = document.createElement("TR");
            out += ` <td>${i.first} ${i.last}</td><td>${i.candidate_id}</td><td>${i.post}</td> <td>${(i.status==0)?'<span class="badge badge-danger badge-pill">Disapproved</span>':'<span class="badge badge-success badge-pill">Approved</span>'}</td><td><span class="badge badge-primary badge-pill">Voted</span></td> <td>
            <button class="text-primary edit_candidate"><i class="fas fa-pen"></i></button>
            <button class="text-danger"><i class="fas fa-trash"></i></button>
            <button class="text-success"><i class="fas fa-undo"></i></button>
          </td>`
            tr.innerHTML = out;
          }
          let rr = table.firstElementChild.nextElementSibling;
          rr.insertBefore(tr, rr.firstElementChild);
          count.dataset.count = res.length;
          count.innerText = res.length;
        }
      }
    })
  }
  static fetchUser(f, params) {
    let q = Ajax.get({
      url: "../../src/Lib/register_candidate.php",
      data: params,
      response: function(res) {
        res = JSON.parse(res);
        f.first.value = res.first
        f.last.value = res.last
        f.candidate_id.value = res.candidate_id
        f.level.value = res.level
        f.gender.value = res.gender
        f.id.value = res.id
        f.p_image.value = res.image
        let optPost = f.post.querySelectorAll("option")
        let optStatus = f.status.querySelectorAll("option")
        f.post.innerHTML = ""
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
        for (let i of optPost) {
          if (i.value == res.post) {
            post.append(i)
          }
          if (i.value != res.post) {
            post.append(i)
            $(f.post).val(`${res.post}`);
          }
        }

        // $('select').trigger("change");
      }
    })

  }
}

if (document.getElementById("add_candidate")) {
  const updateButton = document.getElementById("update_candidate")
  const submit = document.getElementById("add_candidate");
  Form.disableBtn(submit, true);
  Form.disableBtn(updateButton, true);

  Form.cloneForm(document.querySelector(".form_val"));
  Form.appendForm(document.querySelector("#add_form"));
  let f = document.querySelectorAll(".fm")
  // User Details
  const message = document.querySelector(".message");
  const placeholderContainer = document.getElementById("placeholder");
  const first = document.getElementById("first");
  const last = document.getElementById("last");
  const gender = document.getElementById("gender");
  const status = document.getElementById("status");
  const post = document.getElementById("post");
  const candidateId = document.getElementById("candidate_id");
  const level = document.getElementById("level");
  const image = document.getElementById("image");
  const table = document.getElementById("table");
  const id = document.getElementById("id");
  const p_image = document.getElementById("p_image");
  const candidatesCount = document.getElementById("count");
  // Token for cross site request forgery(csrf or xsrf)
  const token = document.getElementById("token");

  const validat = () => {
    let validate = new Validator();
    validate.validate([{
      first: [{
        name: "First",
        required: true,
        min: 3
      }],
      last: [{
        required: true,
        min: 3
      }],
      gender: [{
        required: true
      }],
      level: [{
        required: true,
        numeric: true
      }],
      post: [{
        required: true,
      }],
      candidate_id: [{
        required: true,
        numeric: true
      }],
      status: [{
        required: true
      }]
    }]);
    Form.resetErrors(".form-group", "P");
    if (!validate.isPassed()) {
      Form.disableBtn(submit, true);
      Form.disableBtn(updateButton, true);
      Form.validate(validate.errors());
      return false
    }
    Form.disableBtn(submit, false);
    Form.disableBtn(updateButton, false);
    return true;
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
      first: first.value,
      last: last.value,
      gender: gender.value,
      candidate_id: candidateId.value,
      post: post.value,
      level: level.value,
      status: status.value,
      image: image.files[0],
      token: token.value,
      insert: "insert",
    }
    if (validat()) {
      Candidate.insert(data);
    } else {
      Notify.prompt({
          flag: "error",
          message: "Check for errors"
        },
        3000
      );
    }
  });

  //update

  updateButton.addEventListener("click", () => {
    let newImage;
    if (image.files.length == 0) {
      newImage = p_image.value;
    } else {
      newImage = image.files[0];
    }
    let data = {
      first: first.value,
      last: last.value,
      gender: gender.value,
      candidate_id: candidateId.value,
      post: post.value,
      level: level.value,
      status: status.value,
      image: newImage,
      prev_img: p_image.value,
      token: token.value,
      id: id.value,
      update: "update"

    }
    if (validat()) {
      Candidate.update(data);
    } else {
      Notify.prompt({
          flag: "error",
          message: "Check for errors"
        },
        3000
      );
    }
  });
  // modal popup
  if (document.querySelector(".edit_candidate")) {
    let editBtn = document.querySelectorAll(".edit_candidate")
    let closeBtn = document.querySelector(".modal__close")
    editBtn.forEach((m) => {
      m.addEventListener("click", function() {
        let data = {
          first: first,
          last: last,
          gender: gender,
          candidate_id: candidateId,
          post: post,
          level: level,
          status: status,
          token: token,
          id: id,
          p_image: p_image
        }
        Candidate.fetchUser(data, {
          id: this.id
        })
        Form.appendForm(document.querySelector("#update_form"))
        Modal.open(this, document.querySelector(".modal"))
      })
    })


    closeBtn.addEventListener("click", function() {
      Form.appendForm(document.querySelector("#add_form"))
      Modal.close(document.querySelector(".modal"))
    })
  }
  // modal popup ends
  setInterval(() => {
    Candidate.get(candidatesCount, table, {
      "data": "data"
    });
  }, 1000);
  image.onchange = () => {
    imageUploader.set(image, placeholderContainer);
  }
  message.querySelector("button").addEventListener("click", () => {
    Notify.deletePrompt();
  });
}