//vote
let fieldSet = document.querySelectorAll("fieldset");


let get = () => {
  fieldSet.forEach((item) => {
    let inpt = item.querySelectorAll("input")

    if (item.firstElementChild.dataset.post != undefined) {
      console.log(item.firstElementChild.dataset.post);
    }
    inpt.forEach((i) => {
      if (i.checked) {
        // console.log(i.value);
      }
    })
  })
}
document.querySelector(".submit").onclick = get;