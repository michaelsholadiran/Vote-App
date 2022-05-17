import Form from "./Form.js"
export default class Modal {
  _isOpen = false;
  _isClosed = true;
  static open(element, modal_container) {
    this._isOpen = false
    modal_container.classList.toggle("modal--show")
    modal_container.querySelector("h1").innerText = element.id;
  }

  static close(modal_container) {
    this._isClosed = false;
    modal_container.classList.remove("modal--show")
  }
}