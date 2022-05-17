import Element from "./Element.js";
class Form {
  _clonedForm = null;
  static validate(res) {
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
  }
  static resetErrors(parents, elementToDelete) {
    document.querySelectorAll(parents).forEach(e => {
      if (e.lastElementChild && e.lastElementChild.tagName == elementToDelete) {
        Element.removeBorder(e);
        e.lastElementChild.remove();
        // please this should be enabled below
        // terms.parentElement.parentElement.querySelector("span").innerText = "";
        return true;
      }
      return false;
    });
  }
  static disableBtn(button, status) {
    if (status == true) {
      button.setAttribute("disabled", "disabled");
      button.classList.add("disable");
    } else {
      button.removeAttribute("disabled");
      button.classList.remove("disable");
    }
  }

  static resetForm(form) {
    form.reset();
    $("select.selectBoxIt").select2({
      minimumResultsForSearch: -1,
      placeholder: "Please choose..,"
    });
    $("select").select2({
      placeholder: "Please choose..,"
    });
    // $("select").val(null).trigger("change");
    let p = document.querySelectorAll(".form-group")
    p.forEach(e => {
      if (e.lastElementChild.tagName == "P") {
        e.lastElementChild.remove()
        Element.removeBorder(e)
      }
      if (e.querySelector(".checkbox")) {
        e.firstElementChild.firstElementChild.innerHTML = ""
      }
      if (e.firstElementChild.tagName == "H3") {
        e.firstElementChild.innerHTML = "AJ"
      }
    })
  }

  // Special Purpose Functionality starts
  static cloneForm(form) {
    this._clonedForm = form;
    form.remove();
    // $("select").val();
  }
  static appendForm(parent) {
    parent.insertBefore(this._clonedForm, parent.lastElementChild);
    this.resetForm(parent);
  }
  // Special Purpose Functionality ends here

}
export default Form;