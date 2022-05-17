class Notify {
  static prompt(type, duration) {
    const msgBox = document.querySelector(".notification_message")
    msgBox.querySelector("span").innerText = type.message
    msgBox.firstElementChild.firstElementChild.classList.add(type.flag)
    let errRemove = () => {
      msgBox.firstElementChild.firstElementChild.classList.remove(type.flag)
      msgBox.querySelector("span").innerText = ""
    }
    setTimeout(errRemove, duration);
  }
  static deletePrompt() {
    const msgBox = document.querySelector(".notification_message")
    msgBox.firstElementChild.firstElementChild.className = "message_container";
  }
}
export default Notify;