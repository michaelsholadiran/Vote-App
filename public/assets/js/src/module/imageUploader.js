import Element from "./Element.js";

class imageUploader {

  static set(file, holder) {
    let newImageElement = document.createElement("IMG");

    Element.setAttributes(newImageElement, {
      "width": 122,
      "height": 122,
      "class": "rounded-circle img-thumbnail img-responsive"
    })
    var reader = new FileReader();
    reader.onload = function(e) {
      newImageElement.setAttribute('src', e.target.result);
    }
    newImageElement.onload = function(e) {
      let fileType = file.files[0].type.split("/").pop();
      const validExtention = ["jpg", "jpeg"];


      if (newImageElement.naturalHeight != 122 && newImageElement.naturalWidth != 122) {
        holder.previousElementSibling.firstElementChild.classList.add("d-block");
        holder.previousElementSibling.lastElementChild.innerText = "Size too large";
      } else if (validExtention.indexOf(fileType.toLowerCase()) == -1) {
        holder.previousElementSibling.firstElementChild.classList.add("d-block");
        holder.previousElementSibling.lastElementChild.innerText = "JPG only";
      } else {
        // this would reset the error
        holder.previousElementSibling.firstElementChild.classList.remove("d-block");
        holder.previousElementSibling.lastElementChild.innerText = "";
      }
    }

    reader.readAsDataURL(file.files[0]);
    holder.replaceChild(newImageElement, placeholder.firstElementChild);





  }
}
export default imageUploader;