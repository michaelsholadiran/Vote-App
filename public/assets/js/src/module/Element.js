 export class Element {
   // Element.setAttributes(newSpecify, {
   //         "id": "state",
   //                 })
   static setAttributes(element, attributes) {
     for (var key in attributes) {
       element.setAttribute(key, attributes[key]);
     }
   }

   static appendElement(child, element) {
     let parent = child.parentElement;
     if (parent.lastElementChild.tagName != element.tagName) {
       let isInput = (child.tagName == "INPUT") ? true : false;
       Element.applyBorder(child, isInput);
       parent.appendChild(element)
     }
   }

   static applyBorder(child, isInput = true) {
     let parent = child.parentElement
     if (isInput) {
       return child.classList.add("border-dang");
     }
     return parent.querySelector(".select2-selection--single").className += " border-dang";
   }
   static removeBorder(parent) {
     let target = parent.querySelector("input");
     if (target && target.tagName == "INPUT") {
       target.classList.remove("border-dang");
     } else {
       let target = parent.querySelector(" .select2-selection--single");
       target.classList.remove("border-dang");
     }
   }
 }
 export default Element;